<form method="POST" class="d-block ajaxForm" action="{{ route('department.update', $department->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">{{ translate('session_title') }}</label>
            <input type="text" class="form-control" id="name" name = "name" required value="{{ $department->name }}">
            <small id="department_name_help" class="form-text text-muted">{{ translate('provide_department_title') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('update_department') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllDepartments);
    });
</script>
