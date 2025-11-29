import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import { Popover } from 'bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('portalCalendar');
    if (calendarEl) {
        const eventsData = JSON.parse(calendarEl.dataset.events || '[]');
        
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            height: 'auto',
            events: eventsData.map(event => ({
                title: event.title,
                start: event.start_date,
                end: event.end_date,
                classNames: event.type === 'national' ? ['national-holiday'] : ['restricted-holiday']
            })),
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                // Optional: Show event details in a modal or tooltip
            },
            eventDidMount: function(info) {
                info.el.setAttribute("data-bs-toggle", "popover");
                info.el.setAttribute("data-bs-trigger", "hover");
                info.el.setAttribute("data-bs-placement", "top");
                info.el.setAttribute("data-bs-content", info.event.title);
                new Popover(info.el);
            }
        });
        calendar.render();
    }
});
