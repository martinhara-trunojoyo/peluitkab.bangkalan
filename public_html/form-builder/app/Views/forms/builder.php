<?php
// This file contains the HTML and PHP code for rendering the form builder interface.

<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Builder</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Form</h4>
                        </div>
                        <div class="card-body">
                            <form id="formBuilder">
                                <div class="form-group">
                                    <label>Form Title</label>
                                    <input type="text" class="form-control" id="formTitle" name="formTitle" required>
                                </div>
                                <div class="form-group">
                                    <label>Form Description</label>
                                    <textarea class="form-control" id="formDescription" name="formDescription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Form Fields</label>
                                    <div id="formFieldsContainer"></div>
                                    <button type="button" class="btn btn-primary" onclick="addField()">Add Field</button>
                                </div>
                                <button type="submit" class="btn btn-success">Save Form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function addField() {
    const fieldHtml = `
        <div class="form-group">
            <label>Field Label</label>
            <input type="text" class="form-control" name="fieldLabel[]" required>
            <label>Field Type</label>
            <select class="form-control" name="fieldType[]">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="email">Email</option>
                <option value="textarea">Text Area</option>
                <option value="select">Select</option>
            </select>
        </div>
    `;
    document.getElementById('formFieldsContainer').insertAdjacentHTML('beforeend', fieldHtml);
}

document.getElementById('formBuilder').addEventListener('submit', function(event) {
    event.preventDefault();
    // Add logic to handle form submission
});
</script>
<?= $this->endSection() ?>