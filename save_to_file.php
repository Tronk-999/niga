<?php
// Thay đổi các thông tin sau
$token = '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';
$owner = 'Tronk-999';
$repo = 'Test';
$filePath = 'user_input.txt'; // Đường dẫn file trong repository
$branch = 'main'; // Nhánh mà bạn muốn cập nhật
$apiUrl = "https://api.github.com/repos/$owner/$repo/contents/$filePath";

// Lấy dữ liệu từ form (ví dụ: form gửi dữ liệu bằng phương thức POST)
$newContent = $_POST['data']; // Thay đổi 'data' thành tên trường từ form

// Lấy thông tin hiện tại của file
$options = [
    'http' => [
        'header'  => "Authorization: token $token\r\n" .
                     "User-Agent: PHP\r\n",
        'method'  => 'GET'
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);
$data = json_decode($response, true);

// Kiểm tra xem file có tồn tại không
if (isset($data['sha'])) {
    $sha = $data['sha'];
} else {
    die('File not found.');
}

// Mã hóa nội dung mới
$encodedContent = base64_encode($newContent);

// Cập nhật file trên GitHub
$options = [
    'http' => [
        'header'  => "Authorization: token $token\r\n" .
                     "User-Agent: PHP\r\n" .
                     "Content-Type: application/json\r\n",
        'method'  => 'PUT',
        'content' => json_encode([
            'message' => 'Update file with new content',
            'content' => $encodedContent,
            'sha'     => $sha,
            'branch'  => $branch
        ])
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);

if ($response === false) {
    die('Error updating file.');
}

echo 'File updated successfully!';
?>
