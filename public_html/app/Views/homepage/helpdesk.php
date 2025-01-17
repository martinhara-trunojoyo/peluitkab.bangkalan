<?= $this->extend('layout/home_page') ?>
<?= $this->section('content') ?>
<!-- CK Editor -->
<style>
.ck-editor__editable_inline {
    min-height: 50vh;
}
</style>
<!-- PIN -->
<style>
.pin-code {
    padding: 0;
    margin: 0 auto;
    display: flex;
    justify-content: center;

}

.pin-code input {
    border: none;
    text-align: center;
    width: 48px;
    height: 48px;
    font-size: 36px;
    background-color: #F3F3F3;
    margin-right: 5px;
}



.pin-code input:focus {
    border: 1px solid #573D8B;
    outline: none;
}


.pin-code input::-webkit-outer-spin-button,
.pin-code input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Help Desk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Help Desk</div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Form Help Desk</h4>
                </div>
                <div class="card-body">


                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-12">
                                <div class="wizard-steps">
                                    <div id="box_akun" class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="far fa-user"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Identitas Pelapor
                                        </div>
                                    </div>
                                    <div id="box_perlengkapan" class="wizard-step">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Kode OTP
                                        </div>
                                    </div>
                                    <div id="box_aula" class="wizard-step">
                                        <div class="wizard-step-icon">
                                            <i class="far fa-question-circle"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Pertanyaan / Kendala
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="form_akun">
                            <div class="wizard-content mt-2">
                                <div class="wizard-pane">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-12 text-md-left text-left">Nama Pelapor</label>
                                        <div class="col-lg-12 col-md-12">
                                            <input type="text" id="acara" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-12 text-md-left text-left">Id Chat Telegram</label>
                                        <div class="col-lg-12 col-md-12">
                                            <input type="text" id="meeting_id" class="form-control">
                                            <small class="text-danger">*Balasan dan perkembangan status laporan akan
                                                dikirim ke chat
                                                telegram.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12"></div>
                                        <div class="col-lg-12 col-md-12 text-right">
                                            <button onclick="open_perlengkapan()"
                                                class="btn btn-icon icon-right btn-primary">Selanjutnya
                                                <i class="fas fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="form_perlengkapan" style="display: none;">
                            <div class="wizard-content mt-2">
                                <div class="wizard-pane">
                                    <form>
                                        <center>
                                            <label for="otp" class="form-label">Masukkan Kode OTP</label>
                                        </center>
                                        <div class="pin-code">
                                            <input type="text" id="pin_1" maxlength="1" autofocus>
                                            <input type="text" id="pin_2" maxlength="1">
                                            <input type="text" id="pin_3" maxlength="1">
                                            <input type="text" id="pin_4" maxlength="1">
                                            <input type="text" id="pin_5" maxlength="1">
                                            <input type="text" id="pin_6" maxlength="1">
                                        </div>
                                    </form>

                                    <div class="form-group row mt-4">
                                        <div class="d-flex justify-content-between w-100">
                                            <div class="col-6">
                                                <button onclick="open_akun()"
                                                    class="btn btn-icon icon-left btn-primary"><i
                                                        class="fas fa-arrow-left"></i>Sebelumnya</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button onclick="open_aula()"
                                                    class="btn btn-icon icon-right btn-primary">Selanjutnya
                                                    <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="form_aula" style="display: none;">
                            <div class="wizard-content mt-2">
                                <div class="wizard-pane">

                                    <div class="mb-4">
                                        <div id="container">
                                            <div id="editor">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="d-flex justify-content-between w-100">
                                            <div class="col-6">
                                                <button onclick="back_perlengkapan()"
                                                    class="btn btn-icon icon-left btn-primary"><i
                                                        class="fas fa-arrow-left"></i>Sebelumnya</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button href="#" class="btn btn-warning">Ajukan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>
            </div>


        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    document.getElementById("<?= $title ?>").classList.add("active");

});
</script>
<script>
// This sample still does not showcase all CKEditor 5 features (!)
// Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
        items: [
            'findAndReplace', 'selectAll', '|',
            'heading', '|',
            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
            'removeFormat', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'outdent', 'indent', '|',
            'undo', 'redo',
            '-',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
            'alignment', '|',
            'link', 'insertImage', 'insertTable', 'mediaEmbed'
        ],
        shouldNotGroupWhenFull: true
    },
    // Changing the language of the interface requires loading the language file using the <script> tag.
    // language: 'es',
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true
        }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
        options: [{
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
            },
            {
                model: 'heading5',
                view: 'h5',
                title: 'Heading 5',
                class: 'ck-heading_heading5'
            },
            {
                model: 'heading6',
                view: 'h6',
                title: 'Heading 6',
                class: 'ck-heading_heading6'
            }
        ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Masukkan Pertanyaan dan Kendala Anda !',
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
    fontFamily: {
        options: [
            'default',
            'Arial, Helvetica, sans-serif',
            'Courier New, Courier, monospace',
            'Georgia, serif',
            'Lucida Sans Unicode, Lucida Grande, sans-serif',
            'Tahoma, Geneva, sans-serif',
            'Times New Roman, Times, serif',
            'Trebuchet MS, Helvetica, sans-serif',
            'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
    fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
    },
    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
    htmlSupport: {
        allow: [{
            name: /.*/,
            attributes: true,
            classes: true,
            styles: true
        }]
    },
    // Be careful with enabling previews
    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
    htmlEmbed: {
        showPreviews: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
    link: {
        decorators: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://',
            toggleDownloadable: {
                mode: 'manual',
                label: 'Downloadable',
                attributes: {
                    download: 'file'
                }
            }
        }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
    // mention: {
    //     feeds: [{
    //         marker: '@',
    //         feed: [
    //             '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate',
    //             '@cookie', '@cotton', '@cream',
    //             '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi',
    //             '@ice', '@jelly-o',
    //             '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
    //             '@sesame', '@snaps', '@soufflé',
    //             '@sugar', '@sweet', '@topping', '@wafer'
    //         ],
    //         minimumCharacters: 1
    //     }]
    // },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
        // These two are commercial, but you can try them out without registering to a trial.
        // 'ExportPdf',
        // 'ExportWord',
        'CKBox',
        'CKFinder',
        'EasyImage',
        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
        // Storing images as Base64 is usually a very bad idea.
        // Replace it on production website with other solutions:
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
        // 'Base64UploadAdapter',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
        'MathType',
        // The following features are part of the Productivity Pack and require additional license.
        'SlashCommand',
        'Template',
        'DocumentOutline',
        'FormatPainter',
        'TableOfContents'
    ]
});
</script>
<script>
function open_perlengkapan() {
    document.getElementById("form_akun").style.display = "none";
    document.getElementById("form_perlengkapan").style.display = "block";

    document.getElementById('box_akun').classList.remove("wizard-step-active");
    document.getElementById('box_perlengkapan').classList.add("wizard-step-active");
}

function back_perlengkapan() {
    document.getElementById("form_aula").style.display = "none";
    document.getElementById("form_perlengkapan").style.display = "block";

    document.getElementById('box_aula').classList.remove("wizard-step-active");
    document.getElementById('box_perlengkapan').classList.add("wizard-step-active");
}

function open_akun() {
    document.getElementById("form_akun").style.display = "block";
    document.getElementById("form_perlengkapan").style.display = "none";

    document.getElementById('box_perlengkapan').classList.remove("wizard-step-active");
    document.getElementById('box_akun').classList.add("wizard-step-active");
}

function open_aula() {
    document.getElementById("form_perlengkapan").style.display = "none";
    document.getElementById("form_aula").style.display = "block";

    document.getElementById('box_perlengkapan').classList.remove("wizard-step-active");
    document.getElementById('box_aula').classList.add("wizard-step-active");
}
</script>
<!-- PIN -->
<script>
var pinContainer = document.querySelector(".pin-code");

pinContainer.addEventListener('keyup', function(event) {
    var target = event.srcElement;

    var maxLength = parseInt(target.attributes["maxlength"].value, 10);
    var myLength = target.value.length;

    if (myLength >= maxLength) {
        var next = target;
        while (next = next.nextElementSibling) {
            if (next == null) break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }

    if (myLength === 0) {
        var next = target;
        while (next = next.previousElementSibling) {
            if (next == null) break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }
}, false);

pinContainer.addEventListener('keydown', function(event) {
    var target = event.srcElement;
    target.value = "";
}, false);
</script>

<?= $this->endSection() ?>