<form method="POST" class="d-block ajaxForm" action="{{ route('invoice.mass.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="class">{{ translate('class') }}</label>
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                    <option value="">{{ translate('class') }}</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                <small id="class_help" class="form-text text-muted">{{ translate('select_class') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="section_content_2">{{ translate('section') }}</label>
                <select name="section_id" id = "section_content_2" class="form-control" required>
                    <option value="">{{ translate('select_a_section') }}</option>
                </select>
                <small id="student_help" class="form-text text-muted">{{ translate('select_a_section') }}.</small>
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
            function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content_2').html(response);
                }
            });
        }
    </script>
