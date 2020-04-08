@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-calendar-clock title_icon"></i> {{ translate('event_calendar') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded mb-1 alignToTitle" onclick="showAjaxModal('{{ route('event_calendar.create') }}', '{{ translate('create_new_event') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_new_event') }}</button>
            </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div id = "event_content">
                @include('backend.'.Auth::user()->role.'.event_calendar.list')
            </div> <!-- end table-responsive-->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        refreshEventCalendar();
    });
    var showAllEvents = function () {
        var url = '{{ route("event_calendar.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#event_content').html(response);
                initDataTable("basic-datatable");
                refreshEventCalendar();
            }
        });
    }
    var refreshEventCalendar = function () {
        var url = '{{ route("event_calendar.all") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                    //var events = [{title  : 'event2' ,start  : '2019-01-06 ', end    : '2019-01-07 23:59:59'}, {title  : 'event3' ,start  : '2019-01-16 ', end    : '2019-01-17 23:59:59'}]
                    var event_calendar = [];
                    for(let i = 0; i < response.length; i++) {
                        var obj;
                        obj  = {"title" : response[i].title, "start" : response[i].starting_date, "end" : response[i].ending_date};
                        event_calendar.push(obj);
                    }

                    $('#calendar').fullCalendar({
                    disableDragging: true,
                    events: event_calendar,
                    displayEventTime: false
                });
            }
        });
    }
</script>
@endsection
