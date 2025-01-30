function runMigration() {
    $.ajax({
        url: "<?= base_url('admin/formbuilder/runMigration') ?>",
        type: "POST",
        success: function(response) {
            if (response.status === "success") {
                alert(response.message);
                $("#runMigrationBtn").hide();
            } else {
                alert(response.message);
            }
        },
        error: function(xhr) {
            let errorMessage = "Something went wrong.";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            alert(errorMessage);
        }
    });
}
