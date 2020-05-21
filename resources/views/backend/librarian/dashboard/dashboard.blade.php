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

    <div class="row ">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                        <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> {{ translate('books') }}  <a href="{{ route('parent.index') }}" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                                <h3 class="mt-3 mb-3">
                                    @php
                                        $parents = \App\Book::where(['school_id' => school_id()])->get();
                                        echo count($parents);
                                    @endphp
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">{{ translate('total_number_of_books') }}</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                        <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> {{ translate('books_issued') }}  <a href="{{ route('parent.index') }}" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                                <h3 class="mt-3 mb-3">
                                    @php
                                        $parents = \App\User::where(['school_id' => school_id(), 'role' => 'parent'])->get();
                                        echo count($parents);
                                    @endphp
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">{{ translate('total_number_of_books_issued') }}</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

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
