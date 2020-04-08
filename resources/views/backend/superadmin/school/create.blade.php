<form method="POST" class="d-block ajaxForm" action="{{ route('schools.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="school_name">{{ translate('school_name') }}</label>
            <input type="text" class="form-control" id="school_name" name = "school_name" required>
            <small id="name_help" class="form-text text-muted">{{ translate('provide a school name') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">{{ translate('phone') }}</label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="author_help" class="form-text text-muted">{{ translate('provide phone number') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="address">{{ translate('address') }}</label>
            <input type="text" class="form-control" id="address" name = "address" required>
            <small id="copies_help" class="form-text text-muted">{{ translate('provide school address') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('Save') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllSchools);
    });
</script>
