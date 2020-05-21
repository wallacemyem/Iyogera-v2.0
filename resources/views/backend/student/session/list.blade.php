@php
    $sessions = App\Session::where('school_id', school_id())->get();
@endphp
@if (count($sessions) > 0)
    <div class="row">
        
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ translate('name') }}</th>
                        <th>{{ translate('status') }}</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sessions as $session)
                                <tr>
                                    <td>{{ $session->name }}</td>
                                    <td>
                                        @if ($session->id == get_schools())
                                            <i class="mdi mdi-circle text-success"></i> Active
                                        @else
                                            <i class="mdi mdi-circle text-disable"></i> Deactive
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif

