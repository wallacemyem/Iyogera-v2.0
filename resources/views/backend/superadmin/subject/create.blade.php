<form method="POST" class="d-block ajaxForm" action="{{ route('subject.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="class">{{ translate('class') }}</label>
        <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
            <option value="">{{ translate('select_a_class') }}</option>
            @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <small id="class_help" class="form-text text-muted">{{ translate('select_a_class') }}.</small>
    </div>

    <div class="form-group col-md-12" id = "section_content">
                <label class="col-md-3 col-form-label" for="section_id"> {{ translate('section') }}</label>
                
                    <select name="section_id" id="section_id" class="form-control" required >
                        <option value="">Select A Section</option>
                    </select>
                
            </div>

    <div class="form-group col-md-12">
        <label for="name">{{ translate('subject_name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">{{ translate('provide_subject_title') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="teacher_id" >{{ translate('teacher') }}</label>
        
        <select name="teacher_id" id = "teacher_id" class="form-control" required>
            <option value="">{{ translate('assign_a_teacher') }}</option>
            @foreach (App\Teacher::where(['school_id' => school_id()])->get() as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->user->other_name }} {{ $teacher->user->first_name }} {{ $teacher->user->middle_name }}</option>
            @endforeach
        </select>
            
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
<script>
        var form;
        function classWiseSection(class_id) {
            if(class_id > 0) {

            }else {
                console.log(123);
            }
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content').html(response);
                }
            });
        }
</script>