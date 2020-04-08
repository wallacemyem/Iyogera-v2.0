<form method="POST" class="d-block ajaxForm" action="{{ route('book_issue.store') }}">
        @csrf
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="issue_date">{{ translate('issue_date') }}</label>
            <div class="col-md-9">
                <input type="text" class="form-control date" id="issue_date" data-toggle="date-picker" data-single-date-picker="true" name = "issue_date" value="" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id">{{ translate('class') }}</label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseStudent(this.value)" required>
                    <option value="">{{ translate('select_class') }}</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="student_id"> {{ translate('student') }}</label>
            <div class="col-md-9" id = "student_content">
                <select name="student_id" id="student_id" class="form-control" required >
                    <option value="">{{ translate('select_a_student') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="book_id"> {{ translate('book') }}</label>
            <div class="col-md-9">
                <select name="book_id" id="book_id" class="form-control" required>
                    <option value="">{{ translate('select_book') }}</option>
                    @foreach (App\Book::where('school_id', school_id())->where('session', get_settings('running_session'))->get() as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('save_book_issue_info') }}</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#issue_date').daterangepicker();
        });



        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllBookIssues);
        });

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
