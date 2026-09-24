<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';

session_destroy();
header('Location: ' . ADMIN_URL . '/login.php');
exit;
