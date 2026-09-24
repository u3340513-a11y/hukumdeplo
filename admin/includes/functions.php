<?php
function slugify(string $text): string
{
    $tr = [
        'ş' => 's', 'ç' => 'c', 'ğ' => 'g', 'ü' => 'u', 'ö' => 'o', 'ı' => 'i',
        'Ş' => 's', 'Ç' => 'c', 'Ğ' => 'g', 'Ü' => 'u', 'Ö' => 'o', 'İ' => 'i',
    ];
    $text = mb_strtolower(strtr($text, $tr), 'UTF-8');
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', trim($text));
    return trim($text, '-');
}

function e(string $input): string
{
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function setFlash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlash(): ?array
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function formatDate(string $date, string $format = 'd.m.Y H:i'): string
{
    return date($format, strtotime($date));
}

function handleImageUpload(array $file): array
{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Dosya yükleme hatası oluştu.'];
    }
    if ($file['size'] > MAX_UPLOAD_SIZE) {
        return ['success' => false, 'message' => 'Dosya boyutu 5MB\'dan büyük olamaz.'];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $allowedExts  = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($mimeType, $allowedMimes, true)) {
        return ['success' => false, 'message' => 'Sadece JPG, PNG, GIF ve WEBP dosyaları yüklenebilir.'];
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExts, true)) {
        return ['success' => false, 'message' => 'Geçersiz dosya uzantısı.'];
    }

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    $filename    = uniqid('img_', true) . '.' . $ext;
    $destination = UPLOAD_DIR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return ['success' => false, 'message' => 'Dosya kaydedilemedi.'];
    }

    return ['success' => true, 'filename' => $filename];
}

function paginate(int $total, int $perPage, int $currentPage): array
{
    $totalPages = (int) ceil($total / $perPage);
    return [
        'total'        => $total,
        'per_page'     => $perPage,
        'current_page' => $currentPage,
        'total_pages'  => $totalPages,
        'offset'       => ($currentPage - 1) * $perPage,
        'has_prev'     => $currentPage > 1,
        'has_next'     => $currentPage < $totalPages,
    ];
}

function getStatusBadge(string $status): string
{
    return $status === 'published'
        ? '<span class="badge bg-success">Yayında</span>'
        : '<span class="badge bg-secondary">Taslak</span>';
}
