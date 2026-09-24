<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    http_response_code(403);
    echo json_encode(['error' => 'Yetkisiz erişim.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['file'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dosya bulunamadı.']);
    exit;
}

$result = handleImageUpload($_FILES['file']);

if ($result['success']) {
    echo json_encode(['url' => UPLOAD_URL . $result['filename']]);
} else {
    http_response_code(422);
    echo json_encode(['error' => $result['message']]);
}
