<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store.excel') }}" id = "csv_admission" enctype="multipart/form-data">
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
        <div class="col-12">
            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="name"> Name</label>
                <div class="col-md-9">
                    <button type="button" class="btn btn-primary" name="generate_csv" id="generate_csv">Generate CSV File</button>
                </div>
            </div>
            <a href="" download="bulk_student.csv" style="display: none;" id = "bulk">Download</a>
        </div>

        {{-- <div class="form-group mb-0">
            <label>Custom file input</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
            </div>
        </div> --}}

        <div class="col-12">
            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="name"> Upload CSV</label>
                <div class="col-md-9">
                    <input type="file" name="csv_file" class="form-control" data-label="Select CSV File" data-validate="required" data-message-required="Required" accept="text/csv, .csv" />
                </div>
            </div>
            <a href="" download="bulk_student.csv" style="display: none;" id = "bulk">Download</a>
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
        // $("#bulk_admission").submit(function(e) {

        //     var form = $(this);
        //     ajaxSubmit(e, form, 'teacher_content');
        // });

        $("#generate_csv").click(function(){
            var class_id 	= $('#class_id').val();
            var section_id 	= $('#section_id').val();
            var url = '{{ route("student.generate.csv") }}';

            if(class_id == '' || section_id == '')
                toastr.error("Please make sure that Class and Section is selected");
            else {
                $.ajax({
                    url: url,
                    success: function(response) {
                        toastr.success("File generated");
                        $("#bulk").attr('href', response);
                        jQuery('#bulk')[0].click();
                        console.log(response);
                    }
                });
            }
        });
    </script>
@endsection
