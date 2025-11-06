let documentRowIndex = 0;

// Toggle documents section visibility
document.getElementById('addMoreDocuments').addEventListener('change', function() {
    const documentsSection = document.getElementById('documentsSection');
    const tableBody = document.getElementById('documentsTableBody');
    
    if (this.checked) {
        documentsSection.classList.remove('d-none');
        // Add a blank row by default
        if (tableBody.children.length === 0) {
            addDocumentRow();
        }
    } else {
        documentsSection.classList.add('d-none');
        // Clear all rows when hiding
        tableBody.innerHTML = '';
        documentRowIndex = 0;
    }
});

// Function to add a new document row
function addDocumentRow() {
    const tableBody = document.getElementById('documentsTableBody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>
            <input type="text" class="form-control" name="notice_children[${documentRowIndex}][title]" placeholder="Enter document title">
        </td>
        <td>
            <input type="file" class="form-control" name="notice_children[${documentRowIndex}][document]" accept="application/pdf">
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-outline-danger btn-sm remove-row">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;
    tableBody.appendChild(newRow);
    documentRowIndex++;
}

// Add new document row on button click
document.getElementById('addDocumentRow').addEventListener('click', function() {
    addDocumentRow();
});

// Remove document row
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-row') || e.target.closest('.remove-row')) {
        const row = e.target.closest('tr');
        row.remove();
    }
});