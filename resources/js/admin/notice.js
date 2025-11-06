// Function to generate random hash starting with a number
function generateDocumentHash() {
    const random = Math.random().toString(36).substring(2, 8);
    return '1' + random; // Last 4 digits of timestamp + random string
}

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
    }
});

// Function to add a new document row
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