import './bootstrap';
import 'bootstrap';

const btn = document.getElementById('btnToggle');
const sidebar = document.getElementById('sidebar');
btn && btn.addEventListener('click', () => sidebar.classList.toggle('show'));

const currentUrl = window.location.origin + window.location.pathname;
document.querySelectorAll('#sidebar a').forEach(link => {
    const url = new URL(link.href);
    const linkUrl = url.origin + url.pathname;
    if (currentUrl.includes(linkUrl)) {
        link.classList.add('active');
    }
});