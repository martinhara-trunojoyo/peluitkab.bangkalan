document.addEventListener('DOMContentLoaded', function() {
    loadFormFields();

    document.getElementById('fieldForm').addEventListener('submit', function(event) {
        event.preventDefault();
        saveField();
    });
});

function loadFormFields() {
    fetch('/admin/pelayanan/get_form_fields')
        .then(response => response.json())
        .then(data => {
            const formFieldsList = document.getElementById('formFieldsList');
            formFieldsList.innerHTML = '';

            if (data.length === 0) {
                formFieldsList.innerHTML = '<tr><td colspan="4" class="text-center">No form fields available.</td></tr>';
            } else {
                data.forEach(field => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${field.label}</td>
                        <td>${field.field_type}</td>
                        <td>${field.required ? 'Yes' : 'No'}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editField(${field.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteField(${field.id})">Delete</button>
                        </td>
                    `;
                    formFieldsList.appendChild(row);
                });
            }
        });
}

function saveField() {
    const formData = new FormData(document.getElementById('fieldForm'));

    fetch('/admin/pelayanan/save_form_field', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 200) {
            loadFormFields();
            $('#fieldModal').modal('hide');
            alert(data.message);
        } else {
            alert('Error saving field: ' + data.message);
        }
    });
}

function deleteField(id) {
    if (confirm('Are you sure you want to delete this field?')) {
        fetch(`/admin/pelayanan/delete_form_field/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 200) {
                loadFormFields();
                alert('Field deleted successfully.');
            } else {
                alert('Error deleting field: ' + data.message);
            }
        });
    }
}

function editField(id) {
    // Logic to populate the modal with field data for editing
    // This function should fetch the field data and set it in the modal inputs
}