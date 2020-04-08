@php
    $classes = App\Classes::where('school_id', school_id())->get();
@endphp
@if (count($classes) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('name') }}</th>
                <th>{{ translate('section') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>
                        <ul>
                            @foreach ($class->sections as $section)
                            <li>{{ $section->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.show', $class->id) }}', '{{ translate('sections') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('manage_sections') }}"> <i class="dripicons-checklist"></i> </button>
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.edit', $class->id) }}', '{{ translate('update_class') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_class_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('class.destroy', $class->id) }}', showAllClasses )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Class"> <i class="mdi mdi-window-close"></i> </button>
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

