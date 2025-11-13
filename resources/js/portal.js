import './bootstrap';
import 'bootstrap';
import './portal/calendar';
import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';

function setTheme(theme, button) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    const icon = button.querySelector('i');
    if (icon) {
        icon.className = theme === "dark" ? "bi bi-moon-fill" : "bi bi-sun-fill";
    }
}
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

    const MIN_SCALE = 0.8;
    const MAX_SCALE = 1.4;
    const STEP = 0.05;
    const root = document.documentElement;
    function getScale() {
        return parseFloat(getComputedStyle(root).getPropertyValue('--font-scale')) || 1;
    }
    function setScale(scale) {
        const clamped = Math.min(MAX_SCALE, Math.max(MIN_SCALE, scale));
        console.log(clamped);
        root.style.setProperty('--font-scale', clamped);
    }
    document.getElementById('fontInc').addEventListener('click', () => setScale(getScale() + STEP));
    document.getElementById('fontDec').addEventListener('click', () => setScale(getScale() - STEP));
    document.getElementById('fontReset').addEventListener('click', () => setScale(1));

    // Initialize Swiper sliders
    var swiper = new Swiper(".judges-slider", {
        modules: [Pagination, Autoplay],
        pagination: {
            el: ".swiper-pagination",
        },
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });
});
