<?php
// response.php
function sendResponse($status, $data = [], $message = '') {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => $status,
        'data' => $data,
        'message' => $message
    ]);
}
?>
