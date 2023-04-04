<script src="{{ asset('adminAssets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<script src="{{ asset('adminAssets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('adminAssets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminAssets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function(){
        //localStorage.removeItem('x_xsrf_token')
        $('.select2').select2()
        $('#summernote').summernote()
        bsCustomFileInput.init();
    })
</script>
