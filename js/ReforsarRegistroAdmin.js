document.querySelector('form').addEventListener('submit', function (event) {
    const password = document.getElementById('password').value;

    if (password.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres.');
        event.preventDefault();
    }

    const passwordRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])/;
    if (!passwordRegex.test(password)) {
        alert('La contraseña debe incluir una letra mayúscula, una minúscula, un número y un carácter especial.');
        event.preventDefault();
    }
});