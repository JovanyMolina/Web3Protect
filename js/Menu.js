// Script para abrir y cerrar el menú hamburguesa
document.getElementById("mobile-menu").addEventListener("click", function () {
    const navLinks = document.querySelector(".nav-links");
    navLinks.classList.toggle("active");
});
