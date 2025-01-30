<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Builder - <?= $pelayanan['nama_pelayanan'] ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pelayanan">Data Master Pelayanan</a></div>
                <div class="breadcrumb-item">Form Builder</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Fields</h4>
                            <div class="card-header-action">
                                <button class="btn btn-success mr-2" onclick="openCreateTableModal()">
                                    Create Table <i class="fas fa-database"></i>
                                </button>
                                <a href="<?= base_url() ?>/admin/tiket/view_form/<?= $pelayanan['id_pelayanan'] ?>" class="btn btn-info mr-2">
                                    View Form <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-primary" onclick="openAddFieldModal()">
                                    Add New Field <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Label</th>
                                            <th>Type</th>
                                            <th>Required</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="formFieldsList">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="fieldModal" tabindex="-1" role="dialog" aria-labelledby="fieldModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fieldModalLabel">Add Form Field</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fieldForm">
                    <input type="hidden" id="id_form" name="id_form">
                    <input type="hidden" id="id_pelayanan" name="id_pelayanan" value="<?= $pelayanan['id_pelayanan'] ?>">
                    <div class="form-group">
                        <label>Field Label</label>
                        <input type="text" class="form-control" id="label" name="label" required>
                    </div>
                    <div class="form-group">
                        <label>Field Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="email">Email</option>
                            <option value="date">Date</option>
                            <option value="file">File Upload</option>
                            <option value="textarea">Text Area</option>
                            <option value="select">Select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Required</label>
                        <select class="form-control" id="required" name="required">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveField()">Save Field</button>
            </div>
        </div>
    </div>
</div>

<!-- Create Table Modal -->
<div class="modal fade" id="createTableModal" tabindex="-1" role="dialog" aria-labelledby="createTableModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTableModalLabel">Create Database Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Table Name</label>
                    <input type="text" class="form-control" id="tableName" name="tableName" required 
                           placeholder="Enter table name (without spaces)">
                    <small class="form-text text-muted">Table name should only contain letters, numbers, and underscores</small>
                </div>
                <div id="migrationStatus" class="alert" style="display: none;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="createTableBtn" onclick="validateAndProceed()">Create Table</button>
                <button type="button" class="btn btn-primary" id="runMigrationBtn" style="display: none;" onclick="runMigration()">Run Migration</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    loadFormFields();
    loadGeneratedFormFields();
});

function loadFormFields() {
    $.get('<?= base_url() ?>/admin/pelayanan/get_form_fields/<?= $pelayanan['id_pelayanan'] ?>', function(data) {
        let html = '';
        if (data.length === 0) {
            html = `
                <tr>
                    <td colspan="4" class="text-center">
                        <div class="alert alert-light" role="alert">
                            <i class="fas fa-info-circle"></i> No form fields available. Click "Add New Field" to create one.
                        </div>
                    </td>
                </tr>
            `;
        } else {
            data.forEach(function(field, index) {
                html += `
                    <tr>
                        <td>${field.label}</td>
                        <td>${field.field_type}</td>
                        <td>${field.required == 1 ? 'Yes' : 'No'}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editField(${field.id}, '${field.label}', '${field.field_type}', '${field.required}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteField(${field.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        }
        $('#formFieldsList').html(html);
    });
}

function openAddFieldModal() {
    $('#fieldForm')[0].reset();
    $('#id_form').val('');
    $('#fieldModal').modal('show');
}

function saveField() {
    const formData = {
        id_form: $('#id_form').val(),
        id_pelayanan: $('#id_pelayanan').val(),
        label: $('#label').val(),
        type: $('#type').val(),
        required: $('#required').val(),
        sort_order: $('#formFieldsList.tr').length + 1
    };

    $.ajax({
        url: '<?= base_url() ?>/admin/pelayanan/save_form_field',
        type: 'POST',
        data: formData,
        success: function(response) {
            if(response.status === 200) {
                $('#fieldModal').modal('hide');
                loadFormFields();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to save form field'
            });
        }
    });
}

function deleteField(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url() ?>/admin/pelayanan/delete_form_field/' + id,
                type: 'DELETE',
                success: function(response) {
                    loadFormFields();
                    Swal.fire(
                        'Deleted!',
                        'Field has been deleted.',
                        'success'
                    )
                }
            });
        }
    })
}

// Update the editField function to handle the new field names
function editField(id, label, fieldType, required) {
    $('#id_form').val(id);
    $('#label').val(label);
    $('#type').val(fieldType);
    $('#required').val(required);
    $('#fieldModal').modal('show');
}

function openCreateTableModal() {
    $('#tableName').val('');
    $('#migrationStatus').hide();
    $('#createTableBtn').show();
    $('#runMigrationBtn').hide();
    $('#createTableModal').modal('show');
}

function validateAndProceed() {
    const tableName = $('#tableName').val();
    if (!tableName) {
        showError('Table name is required');
        return;
    }
    
    if (!/^[a-zA-Z0-9_]+$/.test(tableName)) {
        showError('Table name can only contain letters, numbers, and underscores');
        return;
    }

    // Get current form fields
    $.get('<?= base_url() ?>/admin/pelayanan/get_form_fields/<?= $pelayanan['id_pelayanan'] ?>', function(data) {
        if (data.length === 0) {
            showError('Please add form fields before creating the table');
            return;
        }

        $('#createTableBtn').hide();
        $('#runMigrationBtn').show();
        $('#migrationStatus')
            .removeClass('alert-danger')
            .addClass('alert-info')
            .html('Table structure is ready. Click "Run Migration" to create the table.')
            .show();
    });
}

function runMigration() {
    const tableName = $('#tableName').val();
    
    $.ajax({
        url: '<?= base_url() ?>/admin/pelayanan/create_table',
        type: 'POST',
        data: {
            table_name: tableName,
            id_pelayanan: '<?= $pelayanan['id_pelayanan'] ?>'
        },
        success: function(response) {
            if (response.status === 200) {
                $('#migrationStatus')
                    .removeClass('alert-danger alert-info')
                    .addClass('alert-success')
                    .html('Table created successfully!')
                    .show();
                    
                // Add animation for success message
                $('#migrationStatus').fadeIn().delay(2000).fadeOut();

                setTimeout(() => {
                    $('#createTableModal').modal('hide');
                }, 2000);
            } else {
                showError(response.message || 'Failed to create table');
            }
        },
        error: function(xhr) {
            let errorMessage = 'Error creating table';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            showError(errorMessage);
        }
    });
}

function showError(message) {
    $('#migrationStatus')
        .removeClass('alert-success alert-info')
        .addClass('alert-danger')
        .html(message)
        .show();
}

function loadGeneratedFormFields() {
    $.get('<?= base_url() ?>/admin/formbuilder/get_form_fields/<?= $pelayanan['id_pelayanan'] ?>', function(response) {
        if (response.status === 'success') {
            let formFieldsHtml = '';
            response.formFields.forEach(function(field) {
                formFieldsHtml += `
                    <div class="form-group">
                        <label>${field.label}</label>
                        ${getFieldHtml(field)}
                    </div>
                `;
            });
            $('#generatedFormFields').html(formFieldsHtml);
        } else {
            $('#generatedFormFields').html('<div class="alert alert-danger">Failed to load form fields.</div>');
        }
    });
}

function getFieldHtml(field) {
    switch (field.field_type) {
        case 'text':
        case 'email':
        case 'number':
        case 'date':
            return `<input type="${field.field_type}" class="form-control" name="${field.label}" ${field.required == 1 ? 'required' : ''}>`;
        case 'textarea':
            return `<textarea class="form-control" name="${field.label}" ${field.required == 1 ? 'required' : ''}></textarea>`;
        case 'select':
            return `<select class="form-control" name="${field.label}" ${field.required == 1 ? 'required' : ''}></select>`;
        case 'file':
            return `<input type="file" class="form-control" name="${field.label}" ${field.required == 1 ? 'required' : ''}>`;
        default:
            return `<input type="text" class="form-control" name="${field.label}" ${field.required == 1 ? 'required' : ''}>`;
    }
}
</script>
<script src="<?= base_url('assets/js/form_builder.js') ?>"></script>

<?= $this->endSection() ?>
