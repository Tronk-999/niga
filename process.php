<?php
// Kiểm tra nếu dữ liệu từ biểu mẫu được gửi
if (isset($_POST['file-content'])) {
    // Lấy dữ liệu từ biểu mẫu
    $fileContent = $_POST['file-content'];
    $fileContentBase64 = base64_encode($fileContent); // GitHub yêu cầu nội dung phải được mã hóa base64

    // Cấu hình thông tin GitHub
    $owner = 'Tronk-999';  // Thay đổi thành tên người dùng GitHub của bạn
    $repo = 'Test';       // Thay đổi thành tên repository của bạn
    $filePath = 'user_input.txt';  // Thay đổi thành đường dẫn file trong repository
    $token = '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';  // Thay đổi thành Personal Access Token của bạn

    // URL API của GitHub
    $apiUrl = "https://api.github.com/repos/$owner/$repo/contents/$filePath";

    // Dữ liệu gửi đến GitHub API
    $data = [
        'message' => 'Update file via PHP',
        'content' => $fileContentBase64,
        'branch'  => 'main'  // Tên nhánh bạn muốn cập nhật
    ];

    // Cấu hình HTTP context
    $options = [
        'http' => [
            'header'  => [
                "Authorization: token $token",
                "User-Agent: PHP",
                "Content-Type: application/json",
            ],
            'method'  => 'PUT',
            'content' => json_encode($data),
        ],
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);

    // Kiểm tra và xử lý phản hồi
    if ($response === FALSE) {
        die('Có lỗi xảy ra khi gửi yêu cầu tới GitHub.');
    }

    echo "Dữ liệu đã được lưu vào GitHub.";
} else {
    die('Dữ liệu không được gửi.');
}
?>
