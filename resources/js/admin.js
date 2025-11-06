import './bootstrap';
import 'bootstrap';

const btn = document.getElementById('btnToggle');
const sidebar = document.getElementById('sidebar');
btn && btn.addEventListener('click', () => sidebar.classList.toggle('show'));