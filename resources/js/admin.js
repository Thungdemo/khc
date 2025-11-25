import './bootstrap';
import 'bootstrap';

const btn = document.getElementById('btnToggle');
const sidebar = document.getElementById('sidebar');
btn && btn.addEventListener('click', () => sidebar.classList.toggle('show'));

document.querySelectorAll('.safe-submit').forEach(form => {
    form.addEventListener('submit', function(event) {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.classList.add('disabled');
            submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Submitting...`;
        }
    });
});
const currentUrl = window.location.origin + window.location.pathname;
document.querySelectorAll('#sidebar a').forEach(link => {
    const url = new URL(link.href);
    const linkUrl = url.origin + url.pathname;
    if (currentUrl.includes(linkUrl)) {
        link.classList.add('active');
    }
});