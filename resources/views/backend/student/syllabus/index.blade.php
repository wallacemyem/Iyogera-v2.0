@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-chart-timeline title_icon"></i> {{ translate('syllabus') }}
                
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @php
        $id = Auth::user()->id;
        $student = App\Student::where(['user_id' => $id])->get();
        foreach ( $student as $key ) {
        # code...
        }
        $student_id = $key->id;
        $enroll = App\Enroll::where(['student_id' => $student_id])->get();
        foreach ( $enroll as $key2){

        }
        $class_id = $key2->class_id;
        $section_id = $key2->section_id;

        $syllabuses = App\Syllabus::where(['class_id' => $class_id, 'section_id' => $section_id, 'school_id' => get_schools(), 'session' => school_id()])->get();
        
    @endphp
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('title') }}</th>
            <th>{{ translate('syllabus') }}</th>
            <th>{{ translate('subject') }}</th>
            <th>{{ translate('date_added') }}</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach ($syllabuses as $syllabus)
            <tr>
                <td>{{ $syllabus->title }}</td>

                <td>
                    <a href="{{ asset('backend/files/syllabus/'.$syllabus->file) }}" class="btn btn-info" download ><i class="mdi mdi-cloud-download mr-1"></i> <span>{{ translate('download') }}</span></a>
                </td>
                <td>
                    {{ $syllabus->subject->name }}
                </td>
                <td>
                    {{ date('D, d-M-Y', strtotime($syllabus->created_at)) }}
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
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
