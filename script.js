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
