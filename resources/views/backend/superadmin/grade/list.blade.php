@php
    $grades = App\Grade::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get();
@endphp
@if (count($grades) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('grade_name') }}</th>
                <th>{{ translate('grade_point') }}</th>
                <th>{{ translate('mark_from') }}</th>
                <th>{{ translate('mark_upto') }}</th>
                <th>{{ translate('comment') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->grade_point }}</td>
                    <td>{{ $grade->mark_from }}</td>
                    <td>{{ $grade->mark_upto }}</td>
                    <td>{{ $grade->comment }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('grade.edit', $grade->id) }}', '{{ translate('update_grade') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_grade_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                            
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('grade.destroy', $grade->id) }}', showAllGrades )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_grade') }}"> <i class="mdi mdi-window-close"></i> </button>
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


