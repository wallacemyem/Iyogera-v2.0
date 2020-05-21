@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-chart-timeline title_icon"></i> {{ translate('syllabus') }}
                <button type="button" class="btn btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('syllabus.create') }}', '{{ translate('add_syllabus') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_new_syllabus') }}</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="class_id" id="class_id" onchange="classWiseSection(this.value)">
                                <option value="all">{{ translate('select_a_class') }}</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0" id = "section_content">
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="all">{{ translate('select_a_section') }}</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="classAndSectionWiseSyllabus()">{{ translate('filter') }}</button>
                        </div>
                    </div>

                    <div id = "syllabus_content">
                        @include('backend.'.Auth::user()->role.'.syllabus.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

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

        var classAndSectionWiseSyllabus = function () {
            var section_id = $('#section_id').val();
            if(section_id > 0) {
                var url = '{{ route("syllabus.show", "section_id") }}';
                url = url.replace('section_id', section_id);
                $.ajax({
                    type : 'GET',
                    url: url,
                    success : function(response) {
                        $('#syllabus_content').html(response);
                        initDataTable("basic-datatable");
                    }
                });
              }
        }
    </script>
@endsection
