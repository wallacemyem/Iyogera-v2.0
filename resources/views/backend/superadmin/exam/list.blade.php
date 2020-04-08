@php
    $exams = App\Exam::where('school_id', school_id())->where('session', get_settings('running_session'))->get();
@endphp
@if (count($exams) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('name') }}</th>
            <th>{{ translate('starting_date') }}</th>
            <th>{{ translate('ending_date') }}</th>
            <th>{{ translate('option') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->name }}</td>
                <td>
                    {{ date('D, d-M-Y', $exam->starting_date) }}
                </td>
                <td>
                    {{ date('D, d-M-Y', $exam->ending_date) }}
                </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('exam.edit', $exam->id) }}', '{{ translate('Update Exam') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('Update Exam info') }}"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('exam.destroy', $exam->id) }}', showAllExams )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('Delete Exam') }}"> <i class="mdi mdi-window-close"></i> </button>
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

