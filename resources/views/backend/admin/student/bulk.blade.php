<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store.bulk') }}" id = "bulk_admission">
        @csrf

        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                    <option value="">Class</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4" id = "section_content">
                <select name="section_id" id="section_id" class="form-control" required >
                    <option value="">Select A Class First</option>
                </select>
            </div>
        </div>
        <br>
        <div id="first-row">
            <div class="row">
                <div class="col-11">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" name="name[]" class="form-control"  value="" placeholder="Name" required>
                        </div>
                        <div class="form-group col">
                            <input type="email" name="email[]" class="form-control"  value="" placeholder="Email" required>
                        </div>
                        <div class="form-group col">
                            <input type="password" name="password[]" class="form-control"  value="" placeholder="Password" required autocomplete="false">
                        </div>

                        <div class="form-group col">
                            <select name="gender[]" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <input type="text" name="phone[]" class="form-control"  value="" placeholder="Phone" required>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="row">
                        <div class="form-group col">
                            <button type="button" class="btn btn-icon btn-success" onclick="appendRow()"> <i class="mdi mdi-plus"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="blank-row" style="display: none;">
            <div class="row student-row">
                <div class="col-11">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" name="name[]" class="form-control"  value="" placeholder="Name">
                        </div>
                        <div class="form-group col">
                            <input type="email" name="email[]" class="form-control"  value="" placeholder="Email">
                        </div>
                        <div class="form-group col">
                            <input type="password" name="password[]" class="form-control"  value="" placeholder="Password" autocomplete="false">
                        </div>

                        <div class="form-group col">
                            <select name="gender[]" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <input type="text" name="phone[]" class="form-control"  value="" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="row">
                        <div class="form-group col">
                            <button type="button" class="btn btn-icon btn-danger" onclick="removeRow(this)"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">Save Student</button>
        </div>
</form>

@section('scripts')
    <script>
        var blank_field = $('#blank-row').html();

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
        // $("#bulk_admission").submit(function(e) {

        //     var form = $(this);
        //     ajaxSubmit(e, form, 'teacher_content');
        // });

        function appendRow() {
            $('#first-row').append(blank_field);
        }

        function removeRow(elem) {
            $(elem).closest('.student-row').remove();
        }
    </script>
@endsection
