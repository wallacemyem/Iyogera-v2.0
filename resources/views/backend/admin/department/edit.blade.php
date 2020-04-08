<form method="POST" class="d-block ajaxForm" action="{{ route('department.update', $department->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Session Title</label>
            <input type="text" class="form-control" id="name" name = "name" required value="{{ $department->name }}">
            <small id="department_name_help" class="form-text text-muted">Provide Department Title.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Department</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'department_content');
    });
</script>
