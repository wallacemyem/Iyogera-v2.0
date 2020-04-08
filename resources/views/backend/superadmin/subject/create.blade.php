<form method="POST" class="d-block ajaxForm" action="{{ route('subject.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="class">{{ translate('class') }}</label>
        <select name="class_id" id="class_id" class="form-control" required>
            <option value="">{{ translate('select_a_class') }}</option>
            @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <small id="class_help" class="form-text text-muted">{{ translate('select_a_class') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="name">{{ translate('subject_name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">{{ translate('provide_subject_title') }}.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('add_subject') }}</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, classWiseSubject);
    });
</script>
