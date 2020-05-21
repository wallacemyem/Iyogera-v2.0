<div class="slimscroll" style="max-height: 171px;">
    <div class="timeline-alt pb-0">
        @php
            $events = \App\EventCalendar::where('session', get_settings('running_session'))->where('school_id', school_id())->get();
            $date_from = date('Y-m-01')." 00:00:00"; // hard-coded '01' for first day
            $date_to   = date('Y-m-t')." 23:59:59";
        @endphp
        @foreach ($events as $event)
            @if (strtotime($event->starting_date) >= strtotime($date_from) && strtotime($event->starting_date) <= strtotime($date_to))
                <div class="timeline-item">
                    <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                    <div class="timeline-item-info">
                        <a href="#" class="text-info font-weight-bold mb-1 d-block">{{ $event->title }}</a>
                        <p style="font-size: 12px;">{{ date('D, d-M-Y', strtotime($event->starting_date)) }} - {{ date('D, d-M-Y', strtotime($event->ending_date)) }}</p>
                    </div>
                </div> 
            @endif  
        @endforeach
    </div>
</div>