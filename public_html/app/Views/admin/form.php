<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
        </div>
        <div class="section-body">
            <form action="<?= base_url() ?>/admin/save_form" method="post">
                <?php foreach ($formFields as $field): ?>
                    <div class="form-group">
                        <label><?= $field['label'] ?></label>
                        <?php if ($field['type'] == 'text'): ?>
                            <input type="text" name="<?= $field['name'] ?>" class="form-control" placeholder="<?= $field['placeholder'] ?>" <?= $field['required'] ? 'required' : '' ?>>
                        <?php elseif ($field['type'] == 'textarea'): ?>
                            <textarea name="<?= $field['name'] ?>" class="form-control" placeholder="<?= $field['placeholder'] ?>" <?= $field['required'] ? 'required' : '' ?>></textarea>
                        <?php elseif ($field['type'] == 'select'): ?>
                            <select name="<?= $field['name'] ?>" class="form-control" <?= $field['required'] ? 'required' : '' ?>>
                                <?php foreach (explode(',', $field['options']) as $option): ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                        <?php if ($field['help_text']): ?>
                            <small class="form-text text-muted"><?= $field['help_text'] ?></small>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
