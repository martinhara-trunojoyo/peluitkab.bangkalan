<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <h1>Form <?= $route ?></h1>
    <form id="dynamic-form" class="needs-validation" novalidate>
        <?php foreach ($fields as $field): ?>
            <div class="form-group">
                <label><?= $field['label'] ?> <?= $field['required'] ? '<span class="text-danger">*</span>' : '' ?></label>
                <?php if ($field['type'] == 'text' || $field['type'] == 'email' || $field['type'] == 'number'): ?>
                    <input type="<?= $field['type'] ?>" 
                           class="form-control" 
                           name="<?= $field['name'] ?>" 
                           placeholder="<?= $field['placeholder'] ?>" 
                           <?= $field['required'] ? 'required' : '' ?>>
                <?php elseif ($field['type'] == 'textarea'): ?>
                    <textarea class="form-control" 
                              name="<?= $field['name'] ?>" 
                              rows="3" 
                              placeholder="<?= $field['placeholder'] ?>" 
                              <?= $field['required'] ? 'required' : '' ?>></textarea>
                <?php elseif ($field['type'] == 'select'): ?>
                    <select class="form-control select2" 
                            name="<?= $field['name'] ?>" 
                            <?= $field['required'] ? 'required' : '' ?>>
                        <option value="">Pilih <?= $field['label'] ?></option>
                        <?php foreach (json_decode($field['options'], true) as $option): ?>
                            <option value="<?= $option['value'] ?>"><?= $option['label'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php elseif ($field['type'] == 'file'): ?>
                    <div class="custom-file">
                        <input type="file" 
                               class="custom-file-input" 
                               name="<?= $field['name'] ?>" 
                               accept="<?= $field['accept'] ?>" 
                               <?= $field['required'] ? 'required' : '' ?>>
                        <label class="custom-file-label">Pilih file</label>
                    </div>
                <?php endif; ?>
                <?php if ($field['help_text']): ?>
                    <small class="form-text text-muted"><?= $field['help_text'] ?></small>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
$(document).ready(function() {
    // Initialize select2
    $('.select2').select2();

    // Initialize custom file input
    bsCustomFileInput.init();

    // Form validation
    $('#dynamic-form').on('submit', function(event) {
        const form = this;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        }
    });
});
</script>

<?= $this->endSection() ?>
