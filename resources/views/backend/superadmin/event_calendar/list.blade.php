<div class="row justify-content-md-center" style="margin-bottom: 10px;" >
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
            
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-body">
                    
                        @php
                            $events = \App\EventCalendar::where('school_id', school_id())->where('session', get_settings('running_session'))->get();
                        @endphp
            
                        @if (count($events) > 0)
                            <div class="table-responsive-sm" style="margin-top: 29px;">
                                <table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>{{ translate('event_title') }}</th>
                                            <th>{{ translate('from') }}</th>
                                            <th>{{ translate('to') }}</th>
                                            <th>{{ translate('option') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $events as $event)
                                            <tr>
                                                <td> {{ $event->title }} </td>
                                                <td> {{ date('D, d-M-Y', strtotime($event->starting_date)) }} </td>
                                                <td> {{ date('D, d-M-Y', strtotime($event->ending_date)) }} </td>
                                                <td>
                                                    <div class="btn-group mb-2">
                                                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('event_calendar.edit', $event->id) }}', '{{ translate('update_parent') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_parent_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                                                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('event_calendar.destroy', $event->id) }}', showAllEvents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_parent') }}"> <i class="mdi mdi-window-close"></i> </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div style="text-align: center;">
                                    <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
                                    <p>{{ translate('no_data_found') }}</p>
                            </div>
                        @endif
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>        
</div>