<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store.excel') }}" id = "csv_admission" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                    <option value="all">{{ translate('select_a_class') }}</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0" id = "section_content">
                <select name="section_id" id="section_id" class="form-control" required >
                    <option value="">{{ translate('select_a_section') }}</option>
                </select>
            </div>
        </div>
        <br>
        <div class="col-12">
            <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="name"></label>
                <div class="col-md-9">
                    <button type="button" class="btn btn-primary" name="generate_csv" id="generate_csv">{{ translate('generate_csv_file') }}</button>
                </div>
            </div>
            <a href="" download="bulk_student.csv" style="display: none;" id = "bulk">{{ translate('download') }}</a>
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
                <label class="col-md-3 col-form-label" for="name"> {{ translate('upload_csv') }}</label>
                <div class="col-md-9">
                    <input type="file" name="csv_file" class="form-control-file" data-label="Select CSV File" data-validate="required" data-message-required="Required" accept="text/csv, .csv" />
                </div>
            </div>
            <a href="" download="bulk_student.csv" style="display: none;" id = "bulk">{{ translate('download') }}</a>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">{{ translate('save_student') }}</button>
        </div>
</form>

@section('scripts')
    <script>
        var form;
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
        $("#csv_admission").submit(function(e) {

            form = $(this);
            ajaxSubmit(e, form, refreshForm);
        });

        $("#generate_csv").click(function(){
            var url = '{{ route("student.generate.csv") }}';

            $.ajax({
                url: url,
                success: function(response) {
                    toastr.success("File generated");
                    $("#bulk").attr('href', response);
                    jQuery('#bulk')[0].click();
                    console.log(response);
                }
            });
        });

        var refreshForm = function () {
            form.trigger("reset");
        }
    </script>
@endsection
