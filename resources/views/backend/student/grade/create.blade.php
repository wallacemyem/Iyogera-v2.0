<form method="POST" class="d-block ajaxForm" action="{{ route('grade.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="name">{{ translate('grade_name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">{{ translate('provide_a_grade_name') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="grade_point">{{ translate('grade_point') }}</label>
        <input type="number" class="form-control" id="grade_point" name = "grade_point" min="0" required>
        <small id="grade_point_help" class="form-text text-muted">{{ translate('provide_a_grade_point') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="mark_from">{{ translate('mark_from') }}</label>
        <input type="number" class="form-control" id="mark_from" name = "mark_from" min="0" required>
        <small id="mark_from_help" class="form-text text-muted">{{ translate('mark_from') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="mark_upto">{{ translate('mark_upto') }}</label>
        <input type="number" class="form-control" id="mark_upto" name = "mark_upto" required>
        <small id="mark_upto_help" class="form-text text-muted">{{ translate('mark_upto') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="comment">{{ translate('comment') }}</label>
        <input type="text" class="form-control" id="comment" name = "comment" required>
        <small id="comment_help" class="form-text text-muted">{{ translate('provide_a_suitable_comment') }}.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('save_grade') }}</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllGrades);
    });
</script>
