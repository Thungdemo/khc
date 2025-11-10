import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('portalCalendar');
    if (calendarEl) {
        const eventsData = JSON.parse(calendarEl.dataset.events || '[]');
        
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: null
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
                // Add tooltip
                info.el.title = info.event.title;
            }
        });
        calendar.render();
    }
});
