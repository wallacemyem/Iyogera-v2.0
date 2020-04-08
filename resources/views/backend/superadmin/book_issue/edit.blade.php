<form method="POST" class="d-block ajaxForm" action="{{ route('book_issue.update', $book_issue->id) }}">
    @csrf
    @method('PATCH')

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="issue_date">{{ translate('issue_date') }}</label>
        <div class="col-md-9">
            <input type="text" class="form-control date" id="issue_date" data-toggle="date-picker" data-single-date-picker="true" name = "issue_date" value="{{ date('m/d/Y', $book_issue->issue_date) }}" required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="class_id">{{ translate('class') }}</label>
        <div class="col-md-9">
            <select name="class_id" id="class_id" class="form-control" onchange="classWiseStudent(this.value)" required>
                <option value="">{{ translate('select_class') }}</option>
                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                    <option value="{{ $class->id }}" @if($class->id == $book_issue->class_id) selected @endif>{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="student_id"> {{ translate('student') }}</label>
        <div class="col-md-9" id = "student_content">
            <select name="student_id" id="student_id" class="form-control" required >
                <option value="">{{ translate('select_a_student') }}</option>
                @foreach (App\Enroll::where(['class_id' => $book_issue->class_id, 'school_id' => school_id(), 'session' => get_settings('running_session')])->get() as $student)
                    <option value="{{ $student->id }}" @if($student->id == $book_issue->student_id) selected @endif>{{ $student->student->user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="book_id"> {{ translate('book') }}</label>
        <div class="col-md-9">
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">{{ translate('select_book') }}</option>
                @foreach (App\Book::where('school_id', school_id())->where('session', get_settings('running_session'))->get() as $book)
                    <option value="{{ $book->id }}" @if($book_issue->book_id == $book->id) selected @endif>{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('update_book_issue_info') }}</button>
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
