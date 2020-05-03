@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box ">
                <h4 class="page-title"> <i class="em em-heart_decoration" aria-role="presentation" aria-label="HEART DECORATION"></i> {{ translate('dashboard') }} </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ translate('accounts_of') }} {{ date('F') }}  <a href="{{ route('invoice.index') }}" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.".dashboard.invoice")
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3"> {{ translate('expense_of') }} {{ date('F') }} <a href="{{ route('expense.index') }}" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.".dashboard.expense")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            
                                <div id="calendar"></div>
                                        
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
             <!-- end col -->

                <div class="col-xl-4">
                    
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title"> {{ translate('recent_events') }}<a href="{{ route('event_calendar.index') }}" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.'.dashboard.events')
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- end col-->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            initDataTable("expense-datatable");
        });

        $(".widget-flat").mouseenter(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').show();
        }).mouseleave(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').hide();
        });
    </script>

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
