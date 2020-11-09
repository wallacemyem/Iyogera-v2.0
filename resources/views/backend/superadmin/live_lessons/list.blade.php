@php
    $live_lessons = App\Livelesson::where(['school_id' => school_id(), 'session' => get_schools()])->get();
@endphp
@if (count($live_lessons) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('name') }}</th>
                <th>{{ translate('topic') }}</th>
                <th>{{ translate('lesson_from') }}</th>
                <th>{{ translate('lesson_upto') }}</th>
                <th>{{ translate('class') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($live_lessons as $live)
                <tr>
                    <td>{{ $live->name }}</td>
                    <td>{{ $live->topic }}</td>
                    <td>{{ $live->start_time }}</td>
                    <td>{{ $live->end_time }}</td>
                    <td>{{ $live->class_id }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <form method="POST" action=" {{ route('live_lesson_start.meetup') }} " >
                                @csrf
                                <input type="hidden" name="id" value="{{$live->id}}">
                                <button type="submit" formtarget="_blank" class="btn btn-primary"><i class="mdi mdi-face-recognition" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('start_lesson') }}"></i>
                                </button>
                            </form>
                            
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('live_lessons.destroy', $live->id) }}', showAlllive_lessons )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('unpublish_live') }}"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif


