import './bootstrap';
import 'bootstrap';
import './portal/calendar';
import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';
import { Modal } from 'bootstrap';

function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    document.querySelectorAll('.themeToggle').forEach(button => {
        button.dataset.theme === theme ? button.classList.add('active') : button.classList.remove('active');
    });
}
// Load theme from localStorage on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem("theme") || "light";
    setTheme(savedTheme);
    document.querySelectorAll('.themeToggle').forEach(button => {
        button.addEventListener('click', function() {
            const theme = button.dataset.theme;
            setTheme(theme);
        });
    });

    // font size adjustment
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
    new Swiper(".judges-slider", {
        modules: [Pagination, Autoplay],
        pagination: {
            el: ".judges-pagination",
        },
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });

    new Swiper(".ln-slider", {
        modules: [Pagination, Autoplay],
        pagination: {
            el: ".ln-pagination",
        },
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });

    // External link modal
    document.querySelectorAll('.external-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const url = link.href;
            const okBtn = document.querySelector("#external-link-modal .ok-btn");
            okBtn.setAttribute("href", url);
            const modal = new Modal(
                document.getElementById("external-link-modal")
            );
            modal.show();
        });
    });

    // Initialize Chocolat for image lightbox
    if (typeof Chocolat !== 'undefined' && document.querySelector('.chocolat-image')) {
        Chocolat(document.querySelectorAll('.chocolat-image'), {
            loop: true,
            imageSize: 'contain',
            fullScreen: true
        });
    }

    const scrollBox = document.getElementById("quickMenu");
    const collapseEl = document.getElementById("noticeBoardMenu");
    collapseEl.addEventListener('shown.bs.collapse', function () {
        const overflowing = scrollBox.scrollHeight > scrollBox.clientHeight;
        if (overflowing) {
            scrollBox.scrollTo({
                top: scrollBox.scrollHeight,
                behavior: 'smooth'
            });
        }

    });
});
