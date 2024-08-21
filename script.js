document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleButton');
    const textBox = document.getElementById('textBox');

    toggleButton.addEventListener('click', function() {
        if (textBox.classList.contains('hidden')) {
            textBox.classList.remove('hidden');
            textBox.classList.add('show');
            this.classList.add('active'); // Thêm lớp 'active' vào nút khi hiện bảng
        } else {
            textBox.classList.remove('show');
            textBox.classList.add('hidden');
            this.classList.remove('active'); // Loại bỏ lớp 'active' khỏi nút khi ẩn bảng
        }
    });
});
