<form method="POST" class="d-block ajaxForm" action="{{ route('exam.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="name">{{ translate('exam_name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">{{ translate('provide_exam_name') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="starting_date">{{ translate('exam_starting_date') }}</label>
        <input type="text" class="form-control date" id="starting_date" data-toggle="date-picker" data-single-date-picker="true" name = "starting_date" value="" required>
        <small id="date_help" class="form-text text-muted">{{ translate('provide_exam_date') }}.</small>
    </div>
    <div class="form-group col-md-12">
        <label for="ending_date">{{ translate('exam_ending_date') }}</label>
        <input type="text" class="form-control date" id="ending_date" data-toggle="date-picker" data-single-date-picker="true" name = "ending_date" value="" required>
        <small id="date_help" class="form-text text-muted">{{ translate('provide_exam_date') }}.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Save Exam</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#starting_date').daterangepicker();
        $('#ending_date').daterangepicker();
    });

    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllExams);
    });

</script>
