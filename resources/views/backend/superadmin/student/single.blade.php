<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store') }}" id = "single_admission">
        @csrf

        <div class="col-12">

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-fileinput">{{ translate('student_profile_image') }}</label>
                <div class="col-md-9">
                    <input type="file" id="example-fileinput" name="student_image" class="form-control-file">
                </div>
            </div>
            
            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="first_name"> {{ translate('first_name') }}</label>
                <div class="col-md-9">
                    <input type="text" id="first_name" name="first_name" class="form-control"  value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="other_name"> {{ translate('last_name') }}</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="other_name" class="form-control"  value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="middle_name"> {{ translate('other_name') }}</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="middle_name" class="form-control"  value="">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="class_id"> {{ translate('class') }}</label>
                <div class="col-md-9">
                    <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                        <option value="all">Select A Class</option>
                        @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="section_id"> {{ translate('section') }}</label>
                <div class="col-md-9" id = "section_content">
                    <select name="section_id" id="section_id" class="form-control" required >
                        <option value="">Select A Section</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="birthdatepicker">{{ translate('birthday') }}</label>
                <div class="col-md-9">
                    <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="gender">{{ translate('gender') }}</label>
                <div class="col-md-9">
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">{{ translate('select_gender') }}</option>
                        <option value="male">{{ translate('male') }}</option>
                        <option value="female">{{ translate('female') }}</option>
                        <option value="others">{{ translate('others') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-textarea"> {{ translate('address') }} </label>
                <div class="col-md-9">
                    <textarea class="form-control" id="example-textarea" rows="5" name = "address" ></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="phone"> {{ translate('phone') }}</label>
                <div class="col-md-9">
                    <input type="text" id="phone" name="phone" class="form-control"  value="">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">{{ translate('save_student') }}</button>
            </div>
        </form>

@section('scripts')
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

        function onChangeSection(section_id) {

        }

        $(".ajaxForm").validate({});
        $("#single_admission").submit(function(e) {

            form = $(this);
            ajaxSubmit(e, form, refreshForm);
        });

        var refreshForm = function () {
            form.trigger("reset");
        }

    </script>
@endsection
