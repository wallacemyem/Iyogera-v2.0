@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-spellcheck title_icon"></i> {{ translate('grade') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded mb-1 alignToTitle" onclick="showAjaxModal('{{ route('grade.create') }}', 'Create New Grade')"> <i class="mdi mdi-plus"></i> {{ translate('add_grade') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "grade_content">
                        @include('backend.'.Auth::user()->role.'.grade.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllGrades = function () {
        var url = '{{ route("grade.list") }}';

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
