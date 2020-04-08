@php
    $columns  = Schema::getColumnListing('teacher_permissions');
@endphp
@if (isset($teachers) && count($teachers) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
            <thead class="thead-dark">
                <tr>
                    <th> Teacher </th>
                    @foreach ($columns as $column)
                    @php
                        if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                            continue;
                    @endphp
                        <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->user->name }}</td>
                    @foreach ($columns as $column)
                    @php
                        if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                            continue;
                    @endphp
                    <td>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        @php
                            $previous_permissions = \App\TeacherPermission::where(['class_id' => $class_id, 'section_id' => $section_id, 'teacher_id' => $teacher->id])->first();
                        @endphp

                        @if($previous_permissions[$column] == 1)
                            <input type="checkbox" class="permission_switch" id="{{ $column }}-{{ $teacher->id }}" data-switch="info" onchange="togglePermission(this.id, '{{$class_id}}', '{{$section_id}}')" checked/>
                        @else
                            <input type="checkbox" class="permission_switch" id="{{ $column }}-{{ $teacher->id }}" data-switch="info" onchange="togglePermission(this.id, '{{$class_id}}', '{{$section_id}}')"/>
                        @endif

                        <label for="{{ $column }}-{{ $teacher->id }}" data-on-label="On" data-off-label="Off"></label>
                    </td>
                    @endforeach
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
