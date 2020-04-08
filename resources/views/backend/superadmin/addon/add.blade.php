<form method="POST" class="d-block" action="{{ route('addon_manager.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="addon_zip">{{ translate('upload_an_addon') }}</label>
            <input type="file" class="form-control-file" id="addon_zip" name = "addon_zip" required>
            <small id="addon_help" class="form-text text-muted">{{ translate('you_have_to_provide_a_zip_file') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('upload_addon') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllAddons);
    });
</script>
