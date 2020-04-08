<form method="POST" class="d-block ajaxForm" action="{{ route('invoice.single.update', $invoice->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="class">Class</label>
            <select name="class_id" id="class_id" class="form-control" onchange="classWiseStudent(this.value)" required>
                <option value="">Class</option>
                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                    <option value="{{ $class->id }}" @if($class->id == $invoice->class_id) selected @endif>{{ $class->name }}</option>
                @endforeach
            </select>
            <small id="class_help" class="form-text text-muted">Select Class.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="class">Student</label>
            <div id = "student_content">
                <select name="student_id" id="student_id" class="form-control" required >
                    <option value="">Select A Class First</option>
                    @foreach (\App\Enroll::where(['class_id' => $invoice->class_id, 'session' => get_settings('running_session'), 'school_id' => school_id()])->get(); as $student)
                        <option value="{{ $student->id }}" @if($student->id == $invoice->student_id) selected @endif>{{ $student->student->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <small id="student_help" class="form-text text-muted">Select Student.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="title">Invoice Title</label>
            <input type="text" class="form-control" id="title" name = "title" value="{{ $invoice->title }}" required>
            <small id="title_help" class="form-text text-muted">Provide Invoice Title.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="total_amount">Total Amount</label>
            <input type="text" class="form-control" id="total_amount" name = "total_amount" value="{{ $invoice->total_amount }}" required>
            <small id="amount_help" class="form-text text-muted">Provide Total Amount.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="paid_amount">Paid Amount</label>
            <input type="text" class="form-control" id="paid_amount" name = "paid_amount" value="{{ $invoice->paid_amount }}" required>
            <small id="paid_amount_help" class="form-text text-muted">Provide Paid Amount.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required >
                <option value="">Select A Status</option>
                <option value="paid" @if($invoice->status == "paid") selected @endif>Paid</option>
                <option value="unpaid" @if($invoice->status == "unpaid") selected @endif>Unpaid</option>
            </select>
            <small id="status_help" class="form-text text-muted">Select Invoice Status.</small>
        </div>
    </div>
    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Update Invoice</button>
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
