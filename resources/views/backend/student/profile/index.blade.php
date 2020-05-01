@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-settings title_icon"></i>{{ translate('manage_profile') }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div id = "profile_content" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            @include('backend.'.Auth::user()->role.'.profile.edit')
        </div>
    </div>
@endsection


@section('scripts')
    <script>
            function updateProfileInfo() {
                $(".profileAjaxForm").validate({});
                $(".profileAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function changePassword() {
                $(".changePasswordAjaxForm").validate({});
                $(".changePasswordAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function reload() {
                setTimeout(
                function()
                {
                    location.reload();
                }, 1000);
            }
    </script>
@endsection
