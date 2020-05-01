<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    @php
    $selected_branch_id = school_id();
    $selected_branch = \App\School::find($selected_branch_id); 
    isset($title) ? $title = $title." | ".$selected_branch->name : $title = $selected_branch->name; @endphp
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Best school ERP" name="description" />
    <meta content="Iyogera" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/logo-dark.png')}}">
    @include('backend.layout.styles')
</head>

<body @if(Request::route()->getName() == 'daily_attendance.index' || Request::route()->getName() == 'student.create' || Request::route()->getName() == 'report.index' || Request::route()->getName() == 'student.bulk' || Request::route()->getName() == 'student.excel') class="enlarged" data-keep-enlarged="true" @endif >
<!-- Begin page -->
<div class="wrapper">

    @include('backend.'.Auth::user()->role.'.navigation.navigation')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            @include('backend.layout.header')

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('content')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        @include('backend.layout.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

@include('backend.'.Auth::user()->role.'.navigation.right_navigation')
@include('backend.layout.scripts')
@include('backend.layout.modal')
@include('backend.layout.ajax_form')
@yield('scripts')
<script>
function switchLanguage(language_code) {
    $.post('{{ route('language.switch') }}',{_token:'{{ csrf_token() }}', locale:language_code}, function(data){
        location.reload();
    });
}
</script>

</body>
</html>
