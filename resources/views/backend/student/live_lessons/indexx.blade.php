@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-video title_icon"></i> {{ translate('live_lessons') }}
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "grade_content">
                        @include('backend.'.Auth::user()->role.'.live_lessons.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAlllive_lessons = function () {
        var url = '{{ route("live_lesson_list.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#grade_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
