@extends('backend.layout.main')
@section('content')
<!-- start page title -->

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">{{ translate('student_update_form') }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                        <li class="nav-item" data-target-form="#accountForm">
                            <a href="#" class="nav-link rounded-0 pt-2 pb-2 active show">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span class="d-none d-sm-inline">{{ translate('update_student_information') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div id = "update_form">
                        @include('backend.'.Auth::user()->role.'.student.update')
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
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

        $(".ajaxForm").validate({});
        $("#student_update_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'update_form');
        });

    </script>
@endsection


