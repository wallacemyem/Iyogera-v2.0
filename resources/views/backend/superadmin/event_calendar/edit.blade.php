<form method="POST" class="d-block ajaxForm" action="{{ route('event_calendar.update', $event->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group col-md-12">
            <label for="title">{{ translate('event_title') }}</label>
            <input type="text" class="form-control" id="title" name = "title" value="{{ $event->title }}" required>
            <small id="title" class="form-text text-muted">{{ translate('provide_event_title') }}.</small>
        </div>
    
        <div class="form-group col-md-12">
            <label for="starting_date">{{ translate('event_starting_date') }}</label>
            <input type="text" class="form-control date" id="starting_date" data-toggle="date-picker" data-single-date-picker="true" name = "starting_date" value="{{ date('m-d-Y', strtotime($event->starting_date)) }}" required>
            <small id="date_help" class="form-text text-muted">{{ translate('provide_exam_date') }}.</small>
        </div>
        <div class="form-group col-md-12">
            <label for="ending_date">{{ translate('event_ending_date') }}</label>
            <input type="text" class="form-control date" id="ending_date" data-toggle="date-picker" data-single-date-picker="true" name = "ending_date" value="{{ date('m-d-Y', strtotime($event->ending_date)) }}" required>
            <small id="date_help" class="form-text text-muted">{{ translate('provide_exam_date') }}.</small>
        </div>
    
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('update_event') }}</button>
        </div>
    </form>
    
    <script>
        $(document).ready(function() {
            $('#starting_date').daterangepicker();
            $('#ending_date').daterangepicker();
        });
    
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllEvents);
        });
    
    </script>
    