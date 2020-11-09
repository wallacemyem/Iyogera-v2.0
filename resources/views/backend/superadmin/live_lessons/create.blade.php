<form method="POST" class="d-block ajaxForm" action="{{ route('live_lessons.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="name">{{ translate('name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">{{ translate('provide_a_lesson_name') }}.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="topic">{{ translate('topic') }}</label>
        <input type="text" class="form-control" id="topic" name = "topic" required>
        <small id="grade_point_help" class="form-text text-muted">{{ translate('provide_a_topic') }}.</small>
    </div>

    <div class="form-group col-md-12">
            <label for="starting_hour">{{ translate('starting_hour') }}</label>
            
                <select name="starting_hour" id = "starting_hour" class="form-control" required>
                    <option value="">{{ translate('starting_hour') }}</option>
                    @for($i = 0; $i <= 23; $i++)
                        @if ($i < 12)
                            @if ($i == 0)
                                <option value="{{ $i }}">{{ '12' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                        @endif
                    @endfor
                </select>
            
        </div>
        <div class="form-group col-md-12">
            <label for="starting_minute">{{ translate('starting_minute') }}</label>
            
                <select name="starting_minute" id = "starting_minute" class="form-control" required>
                    <option value="">{{ translate('starting_minute') }}</option>
                    @for($i = 0; $i <= 55; $i = $i+5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            
        </div>
        <div class="form-group col-md-12">
            <label for="start_day">Day</label>
            
                <select name="start_day" id = "start_day" class="form-control" required>
                    <option value="am">{{ translate('AM') }}</option>
                    <option value="pm">{{ translate('PM') }}</option>
                </select>
            
        </div>

    <div class="form-group col-md-12">
            <label for="ending_hour">{{ translate('ending_hour') }}</label>
            
                <select name="ending_hour" id = "ending_hour" class="form-control" required>
                    <option value="">{{ translate('ending_hour') }}</option>
                    @for($i = 0; $i <= 23; $i++)
                        @if ($i < 12)
                            @if ($i == 0)
                                <option value="{{ $i }}">{{ '12' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                        @endif
                    @endfor
                </select>
            
        </div>
        <div class="form-group col-md-12">
            <label for="ending_minute">{{ translate('ending_minute') }}</label>
            
                <select name="ending_minute" id = "ending_minute" class="form-control" required>
                    <option value="">{{ translate('ending_minute') }}</option>
                    @for($i = 0; $i <= 55; $i = $i+5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
           
        </div>

        <div class="form-group col-md-12">
            <label for="end_day">Day</label>
            
                <select name="end_day" id = "end_day" class="form-control" required>
                    <option value="am">{{ translate('AM') }}</option>
                    <option value="pm">{{ translate('PM') }}</option>
                </select>
            
        </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('save_grade') }}</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAlllive_lessons);
    });
</script>
