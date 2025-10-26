import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'bootstrap';
import '../sass/app.scss';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

document.addEventListener('DOMContentLoaded', () => {
    // Initialize all inputs with class `datetimepicker`
    document.querySelectorAll('.datetimepicker').forEach(el => {
        flatpickr(el, {
            enableTime: true,
            time_24hr: false,
            dateFormat: "d-m-Y h:i K",
            // locale: "en" // import locale if needed
        });
    });
});