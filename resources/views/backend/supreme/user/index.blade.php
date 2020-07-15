@extends('backend.layout.main-s')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box ">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> {{ translate('users') }}
                
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                <select class="form-control select2" data-toggle="select2" name="school_id" id="school_id">
                                    <option value="all">{{ translate('all_schools') }}</option>
                                    @foreach (App\School::get() as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                <button type="button" class="btn btn-icon btn-secondary form-control" onclick="departmentWiseFilter()">{{ translate('filter') }}</button>
                            </div>
                        </div>
                    </div>
                    <div id = "user_content">
                        @include('backend.'.Auth::user()->role.'.user.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        var departmentWiseFilter = function() {
            var school_id = $('#school_id').val();
            var url = '{{ route("user.show", "school_id") }}';
            url = url.replace('school_id', school_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#user_content').html(response);
                    initDataTable("basic-datatable");
                }
            });
        }
    </script>
@endsection
