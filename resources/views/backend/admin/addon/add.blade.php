<form method="POST" class="d-block" action="{{ route('addon_manager.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="addon_zip">Upload an addon</label>
            <input type="file" class="form-control" id="addon_zip" name = "addon_zip" required>
            <small id="addon_help" class="form-text text-muted">You have to provide a zip file.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Upload Addon</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'addon_content');
    });
</script>
