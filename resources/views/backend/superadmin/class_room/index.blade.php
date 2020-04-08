@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-library title_icon"></i> {{ translate('class_room') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('room.create') }}', '{{ translate('create_new_class_room') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_class_room') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "room_content">
                        @include('backend.'.Auth::user()->role.'.class_room.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllClassRooms = function () {
        var url = '{{ route("room.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#room_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
