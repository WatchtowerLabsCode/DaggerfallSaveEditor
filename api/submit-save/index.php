<?php

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Read the raw POST body
$body = file_get_contents('php://input');

if (empty($body)) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Empty body']);
    exit;
}

// Validate it's actual JSON
$decoded = json_decode($body);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

// Cap at 10MB to prevent abuse
if (strlen($body) > 10 * 1024 * 1024) {
    http_response_code(413);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Payload too large']);
    exit;
}

// Write to saves directory with unique filename
$savesDir = realpath(__DIR__ . '/../../saves');
if (!$savesDir || !is_dir($savesDir)) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Storage directory not found']);
    exit;
}

$filename = date('Y-m-d_H-i-s') . '_' . bin2hex(random_bytes(4)) . '.json';
$filepath = $savesDir . '/' . $filename;

if (file_put_contents($filepath, $body) === false) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Failed to write file']);
    exit;
}

http_response_code(200);
header('Content-Type: application/json');
echo json_encode(['status' => 'ok']);
