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
