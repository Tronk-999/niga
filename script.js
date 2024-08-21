document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleButton');
    const textBox = document.getElementById('textBox');

    toggleButton.addEventListener('click', function() {
        if (textBox.classList.contains('hidden')) {
            textBox.classList.remove('hidden');
            textBox.classList.add('show');
        } else {
            textBox.classList.remove('show');
            textBox.classList.add('hidden');
        }
    });
});
document.getElementById('toggleButton').addEventListener('click', function() {
        var textBox = document.getElementById('textBox');
        var button = this;

        if (textBox.classList.contains('hidden')) {
            textBox.classList.remove('hidden');
            textBox.classList.add('show');
            button.classList.add('active');
        } else {
            textBox.classList.remove('show');
            textBox.classList.add('hidden');
            button.classList.remove('active');
        }
    });
