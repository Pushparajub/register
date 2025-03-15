<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $file = 'data.txt';

    $content = "Timestamp: " . date("Y-m-d H:i:s") . "\n"; // Add timestamp
    $content .= "Name: " . $data['name'] . "\n";
    $content .= "Email: " . $data['email'] . "\n";
    $content .= "Mobile: " . $data['mobile'] . "\n";
    $content .= "Age: " . $data['age'] . "\n";
    $content .= "Gender: " . $data['gender'] . "\n";
    $content .= "Country: " . $data['country'] . "\n";
    $content .= "Verification: " . $data['verification'] . "\n";
    $content .= "------------------------\n";

    file_put_contents($file, $content, FILE_APPEND | LOCK_EX);

    http_response_code(200);
    echo json_encode(['message' => 'Data saved successfully']);
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid data']);
}
?>