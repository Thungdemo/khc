import './bootstrap';
import 'bootstrap';
import { Modal } from 'bootstrap';
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
document.querySelectorAll('.show-resource-btn').forEach(element=>{
    element.addEventListener('click', function(){
        let modal = document.getElementById('show-resource-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.id = 'show-resource-modal';
            modal.className = 'modal';
            modal.tabIndex = -1;
            modal.setAttribute('aria-labelledby', 'showResourceModalLabel');
            modal.setAttribute('aria-hidden', 'true');
            modal.innerHTML = `
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showResourceModalLabel">Resource</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Loading...
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
        }
        const dataset = element.dataset;
        if (dataset.url) {
            const modalBody = modal.querySelector('#show-resource-modal .modal-body');
            axios.get(dataset.url)
            .then(response => {
                modalBody.innerHTML = response.data;
            })
            .catch(error => {
                modalBody.textContent = 'Failed to load resource.';
            });
        }
        const bsModal = new Modal(modal);
        bsModal.show();
    });
});
