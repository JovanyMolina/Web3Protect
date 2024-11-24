document.querySelector('form').addEventListener('submit', function (event) {
    const telefono = document.getElementById('telefono').value;
    const cedula = document.getElementById('cedulaProfesional').value;

    if (!/^\d{10}$/.test(telefono)) {
        alert('El teléfono debe tener exactamente 10 dígitos.');
        event.preventDefault();
    }

    if (!/^\d{7,10}$/.test(cedula)) {
        alert('La cédula profesional debe tener entre 7 y 10 dígitos.');
        event.preventDefault();
    }
});