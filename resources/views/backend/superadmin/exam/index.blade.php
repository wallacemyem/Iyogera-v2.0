@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-grease-pencil title_icon"></i> {{ translate('exam') }}
                <button type="button" class="btn btn-icon btn-success mb-1 btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('exam.create') }}', '{{ translate('Create New Exam') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_exam') }} </button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "exam_content">
                        @include('backend.'.Auth::user()->role.'.exam.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllExams = function () {
        var url = '{{ route("exam.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#exam_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
