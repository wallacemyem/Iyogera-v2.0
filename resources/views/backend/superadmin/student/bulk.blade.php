<form method="POST" class="col-12 ajaxForm" action="{{ route('student.store.bulk') }}" id = "bulk_admission">
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
        <div id = "first-row">
            <div class="row">
                <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3 mb-lg-0">
                    <div class="row justify-content-md-center">
                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="first_name[]" class="form-control"  value="" placeholder="First Name" required>
                        </div>

                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="other_name[]" class="form-control"  value="" placeholder="Last Name" required>
                        </div>

                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="middle_name[]" class="form-control"  value="" placeholder="Other Name">
                        </div>
            
                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <select name="gender[]" class="form-control" required>
                                <option value="others">{{ translate('others') }}</option>
                                <option value="male">{{ translate('male') }}</option>
                                <option value="female">{{ translate('female') }}</option>
                                
                            </select>
                        </div>

                        {{-- <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="phone[]" class="form-control"  value="" placeholder="Phone" required>
                        </div> --}}
                        
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 mb-3 mb-lg-0">
                    <div class="row justify-content-md-center">
                        <div class="form-group col">
                            <button type="button" class="btn btn-icon btn-success" onclick="appendRow()"> <i class="mdi mdi-plus"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id = "blank-row" style="display: none;">
            <div class="row student-row">
                <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3 mb-lg-0">
                    <div class="row justify-content-md-center">
                    <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="first_name[]" class="form-control"  value="" placeholder="First Name" required>
                        </div>

                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="other_name[]" class="form-control"  value="" placeholder="Last Name" required>
                        </div>

                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="middle_name[]" class="form-control"  value="" placeholder="Other Name">
                        </div>

                        <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <select name="gender[]" class="form-control">
                                <option value="others">{{ translate('others') }}</option>
                                <option value="male">{{ translate('male') }}</option>
                                <option value="female">{{ translate('female') }}</option>
                                
                            </select>
                        </div>

                        {{-- <div class="form-group col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-1 mb-lg-0">
                            <input type="text" name="phone[]" class="form-control"  value="" placeholder="Phone">
                        </div> --}}

                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 mb-3 mb-lg-0">
                    <div class="row justify-content-md-center">
                        <div class="form-group col">
                            <button type="button" class="btn btn-icon btn-danger" onclick="removeRow(this)"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">{{ translate('save_student') }}</button>
        </div>
</form>

@section('scripts')
    <script>
        var form;

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
        $("#bulk_admission").submit(function(e) {

            form = $(this);
            ajaxSubmit(e, form, refreshForm);
        });

        function appendRow() {
        $('#first-row').append(blank_field);
        }

        function removeRow(elem) {
            $(elem).closest('.student-row').remove();
        }

        var refreshForm = function () {
            form.trigger("reset");
        }
    </script>
@endsection
