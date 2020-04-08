@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-multiple-check title_icon"></i> Assigned Permission For Teacher</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-3">Permissions</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <select class="form-control" name="class_id" id="class_id" onchange="classWiseSection(this.value)">
                                <option value="all">Class</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id = "section_content" class="col-md-4">
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="all">Select Class First</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive-sm" id = "teacher_permission_content">
                        @include('backend.'.Auth::user()->role.'.permission.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSection(class_id) {
            $('.permission_switch').attr('disabled', true);
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
          if(section_id > 0) {
            var url = '{{ route("permission.show", "section_id") }}';
            url = url.replace('section_id', section_id);
            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#teacher_permission_content').html(response);
                }
            });
          }else {
            $('.permission_switch').attr('disabled', true);
          }
        }

        function togglePermission(task_teacherId, class_id, section_id) {
          var url = '{{ route("permission.assign") }}';
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          var isChecked = $('#' + task_teacherId).is(":checked") ? 1 : 0;

          $.ajax({
            type : 'POST',
            url : url,
            data: {_token: CSRF_TOKEN, class_id : class_id, section_id : section_id, task_teacherId : task_teacherId, isChecked : isChecked},
            success : function(response) {
              toastr.success('Permission updated successfully');
            }
          });
        }
    </script>
@endsection
