import axios from 'axios';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.datetimepicker').forEach(el => {
        flatpickr(el, {
            enableTime: true,
            time_24hr: false,
            dateFormat: "d-m-Y h:i K",
        });
    });
    document.querySelectorAll('.datepicker').forEach(el => {
        flatpickr(el, {
            dateFormat: "d-m-Y",
        });
    });
});
document.querySelectorAll('.imgp-input').forEach(input => {
    input.addEventListener('change', function() {
        const target = this.dataset.target;
        const previewImg = document.querySelector(target);
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                let parent = previewImg.parentElement;
                while (parent && !parent.classList.contains('imgp-preview')) {
                    parent = parent.parentElement;
                }
                if (parent && parent.classList.contains('imgp-preview')) {
                    parent.style.display = 'block';
                }
            }
            reader.readAsDataURL(file);
        }
    });
});
