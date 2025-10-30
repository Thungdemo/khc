import './bootstrap';
import 'bootstrap';

// Load theme from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem("theme") || "light";
    const themeToggle = document.getElementById('themeToggle');
    setTheme(savedTheme, themeToggle);
    
    document.getElementById('themeToggle').addEventListener('click', function() {
        const current = document.documentElement.getAttribute("data-theme");
        const next = current === "dark" ? "light" : "dark";
        setTheme(next, this);
    });
});

function setTheme(theme, button) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    const icon = button.querySelector('i');
    if (icon) {
        icon.className = theme === "dark" ? "bi bi-moon-fill" : "bi bi-sun-fill";
    }
}