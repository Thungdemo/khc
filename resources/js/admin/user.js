const noticeRole = document.getElementById('noticerole');
const noticeCategoriesSection = document.getElementById('noticeCategoriesSection');
noticeRole.addEventListener('change', function() {
    if (this.checked) {
        noticeCategoriesSection.classList.remove('d-none');
    } else {
        noticeCategoriesSection.classList.add('d-none');
    }
});