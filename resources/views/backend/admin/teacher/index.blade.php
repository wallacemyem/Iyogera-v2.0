@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                   <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Teacher</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('teacher.create') }}', 'Create New Teacher')"> <i class="mdi mdi-plus"></i> Add New Teacher</button>
                    <h4 class="header-title mt-3">Teacher List</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <select class="form-control col-md-4" name="department_id" id="" onchange="departmentWiseFilter(this.value)">
                            <option value="all">All Department</option>
                            @foreach (App\Department::where('school_id', school_id())->get() as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table-responsive-sm" id = "teacher_content">
                        @include('backend.'.Auth::user()->role.'.teacher.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function departmentWiseFilter(department_id) {
            var url = '{{ route("teacher.show", "department_id") }}';
            url = url.replace('department_id', department_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#teacher_content').html(response);
                }
            });
        }
    </script>
@endsection
