<form method="POST" class="d-block ajaxForm" action="{{ route('invoice.single.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="class">{{ translate('class') }}</label>
            <select name="class_id" id="class_id" class="form-control" onchange="classWiseStudent(this.value)" required>
                <option value="">{{ translate('select_class') }}</option>
                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <small id="class_help" class="form-text text-muted">{{ translate('select_class') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="class">{{ translate('select_student') }}</label>
            <div id = "student_content">
                <select name="student_id" id="student_id" class="form-control" required >
                    <option value="">{{ translate('select_student') }}</option>
                </select>
            </div>
            <small id="student_help" class="form-text text-muted">{{ translate('select_student') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="title">{{ translate('invoice_title') }}</label>
            <input type="text" class="form-control" id="title" name = "title" required>
            <small id="title_help" class="form-text text-muted">{{ translate('provide_invoice_title') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="total_amount">{{ translate('total_amount') }}</label>
            <input type="text" class="form-control" id="total_amount" name = "total_amount" required>
            <small id="amount_help" class="form-text text-muted">{{ translate('provide_total_amount') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="paid_amount">{{ translate('paid_amount') }}</label>
            <input type="text" class="form-control" id="paid_amount" name = "paid_amount" required>
            <small id="paid_amount_help" class="form-text text-muted">{{ translate('provide_paid_amount') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="status">{{ translate('status') }}</label>
            <select name="status" id="status" class="form-control" required >
                <option value="">{{ translate('select_a_status') }}</option>
                <option value="paid">{{ translate('paid') }}</option>
                <option value="unpaid">{{ translate('unpaid') }}</option>
            </select>
            <small id="status_help" class="form-text text-muted">{{ translate('select_invoice_status') }}.</small>
        </div>
    </div>
    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('create_invoice') }}</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllInvoices);
    });
</script>

<script>
        function classWiseStudent(class_id) {
            var url = '{{ route("book_issue.student", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#student_content').html(response);
                }
            });
        }
</script>
