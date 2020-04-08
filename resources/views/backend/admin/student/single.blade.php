<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store') }}" id = "single_admission">
        @csrf

        <div class="col-12">
            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="name"> Name</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="name" class="form-control"  value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="email">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="password"> Password</label>
                <div class="col-md-9">
                    <input type="password" id="password" name="password" class="form-control"  value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="parent_id"> Parent</label>
                <div class="col-md-9">
                    <select id="parent_id" name="parent_id" class="form-control" required >
                        <option value="">Select A Parent</option>
                        @foreach (\App\User::where('school_id', school_id())->where('role', 'parent')->get() as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="class_id"> Class</label>
                <div class="col-md-9">
                    <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                        <option value="">Class</option>
                        @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="section_id"> Section</label>
                <div class="col-md-9" id = "section_content">
                    <select name="section_id" id="section_id" class="form-control" required >
                        <option value="">Select A Class First</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                <div class="col-md-9">
                    <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="gender">Gender</label>
                <div class="col-md-9">
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-textarea"> Address </label>
                <div class="col-md-9">
                    <textarea class="form-control" id="example-textarea" rows="5" name = "address" ></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                <div class="col-md-9">
                    <input type="text" id="phone" name="phone" class="form-control"  value="" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">Save Student</button>
            </div>
        </form>

@section('scripts')
    <script>
        function classWiseSection(class_id) {
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

            var form = $(this);
            ajaxSubmit(e, form, 'teacher_content');
        });
    </script>
@endsection
