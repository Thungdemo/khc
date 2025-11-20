// Function to generate random hash starting with a number
function generateDocumentHash() {
    const random = Math.random().toString(36).substring(2, 8);
    return '1' + random; // Last 4 digits of timestamp + random string
}

document.getElementById('addMoreDocuments').addEventListener('change', function() {
    const documentsSection = document.getElementById('documentsSection');
    const tableBody = document.getElementById('documentsTableBody');
    
    if (this.checked) {
        documentsSection.classList.remove('d-none');
        if (tableBody.children.length === 0) {
            addDocumentRow();
        }
    } else {
        documentsSection.classList.add('d-none');
        tableBody.innerHTML = '';
    }
});
function addDocumentRow() {
    const tableBody = document.getElementById('documentsTableBody');
    const documentHash = generateDocumentHash();
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>
            <input type="text" class="form-control" name="notice_children[${documentHash}][title]" placeholder="Enter document title">
        </td>
        <td>
            <input type="file" class="form-control" name="notice_children[${documentHash}][document]" accept="application/pdf">
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-outline-danger btn-sm remove-row">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);
}
document.getElementById('addDocumentRow').addEventListener('click', function() {
    addDocumentRow();
});
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-row') || e.target.closest('.remove-row')) {
        const row = e.target.closest('tr');
        row.remove();
    }
});
document.getElementById('schedule').addEventListener('change', function() {
    if (this.checked) {
        document.getElementById('publishDateSection').classList.remove('d-none');
    } else {
        document.getElementById('publishDateSection').classList.add('d-none');
    }
});
document.getElementById('notice_category_id').addEventListener('change', function() {
    const select = document.getElementById('notice_subcategory_id');
    select.innerHTML = '<option value="">Loading...</option>';
    axios.get('notice-subcategories', {
        params: {
            notice_category_id: this.value
        }
    }).then(function (response) {
        console.log(response);
        const categories = response.data;
        select.innerHTML = '<option value="">Select Subcategory</option>';
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id;
            option.textContent = category.name;
            select.appendChild(option);
        });
    });
});
