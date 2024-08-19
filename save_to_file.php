<?php
// Đặt tên tệp và đường dẫn để lưu dữ liệu
$file = 'user_input.txt';

// Lấy dữ liệu từ form
$userInput = $_POST['userInput'];

// Mở tệp tin hoặc tạo tệp tin mới
$fileHandle = fopen($file, 'w');

// Kiểm tra nếu tệp tin mở thành công
if ($fileHandle) {
    // Ghi dữ liệu vào tệp tin
    fwrite($fileHandle, $userInput);
    // Đóng tệp tin
    fclose($fileHandle);
    echo "Data has been saved to " . htmlspecialchars($file);
} else {
    echo "Unable to open file for writing.";
}
?>
