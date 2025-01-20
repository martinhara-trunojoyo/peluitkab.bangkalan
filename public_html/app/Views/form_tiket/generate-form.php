<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Generated Form - <?= $pelayanan['nama_pelayanan'] ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pelayanan">Data Master Pelayanan</a></div>
                <div class="breadcrumb-item">Generated Form</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Preview</h4>
                        </div>
                        <div class="card-body">
                            <form id="generatedForm" method="POST" enctype="multipart/form-data">
                                <?php foreach ($form_fields as $field): ?>
                                    <div class="form-group">
                                        <label><?= $field['label'] ?><?= $field['required'] ? ' <span class="text-danger">*</span>' : '' ?></label>
                                        
                                        <?php switch($field['field_type']): 
                                            case 'text': ?>
                                                <input type="text" class="form-control" name="field_<?= $field['id'] ?>" 
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                            <?php break; ?>
                                            
                                            <?php case 'number': ?>
                                                <input type="number" class="form-control" name="field_<?= $field['id'] ?>"
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                            <?php break; ?>
                                            
                                            <?php case 'email': ?>
                                                <input type="email" class="form-control" name="field_<?= $field['id'] ?>"
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                            <?php break; ?>
                                            
                                            <?php case 'date': ?>
                                                <input type="date" class="form-control" name="field_<?= $field['id'] ?>"
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                            <?php break; ?>
                                            
                                            <?php case 'file': ?>
                                                <input type="file" class="form-control" name="field_<?= $field['id'] ?>"
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                            <?php break; ?>
                                            
                                            <?php case 'textarea': ?>
                                                <textarea class="form-control" name="field_<?= $field['id'] ?>" rows="3"
                                                    <?= $field['required'] ? 'required' : '' ?>></textarea>
                                            <?php break; ?>
                                            
                                            <?php case 'select': ?>
                                                <select class="form-control" name="field_<?= $field['id'] ?>"
                                                    <?= $field['required'] ? 'required' : '' ?>>
                                                    <option value="">Choose...</option>
                                                </select>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                <?php endforeach; ?>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('#generatedForm').on('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        formData.append('id_pelayanan', '<?= $pelayanan['id_pelayanan'] ?>');

        $.ajax({
            url: '<?= base_url() ?>/admin/tiket/save',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.status === 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '<?= base_url() ?>/admin/tiket';
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to submit form'
                });
            }
        });
    });
});
</script>
<?= $this->endSection() ?>
x`