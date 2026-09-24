        </div><!-- /page-content -->
    </div><!-- /main-content -->
</div><!-- /wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<?php if (!empty($useTinyMCE)): ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/lang/summernote-tr-TR.min.js"></script>
<script>
$(function() {
    $('#post-content').summernote({
        lang: 'tr-TR',
        height: 450,
        toolbar: [
            ['style',  ['style']],
            ['font',   ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fontsize', ['fontsize']],
            ['color',  ['color']],
            ['para',   ['ul', 'ol', 'paragraph']],
            ['table',  ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view',   ['fullscreen', 'codeview']],
        ],
        callbacks: {
            onImageUpload: function(files) {
                var fd = new FormData();
                fd.append('file', files[0]);
                $.ajax({
                    url: '<?= ADMIN_URL ?>/upload_handler.php',
                    type: 'POST',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#post-content').summernote('insertImage', res.url);
                    }
                });
            }
        }
    });
});
</script>
<?php endif; ?>
<script src="<?= ADMIN_URL ?>/assets/js/admin.js"></script>
<?php if (!empty($extraScripts)) echo $extraScripts; ?>
</body>
</html>
