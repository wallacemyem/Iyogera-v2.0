@php
    $columns  = Schema::getColumnListing('teacher_permissions');
@endphp

<table class="table table-hover table-centered mb-0">
        <thead>
            <tr>
                <td> Teacher </td>
                @foreach ($columns as $column)
                @php
                    if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                        continue;
                @endphp
                    <td>{{ ucfirst(str_replace('_', ' ', $column)) }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
                @if (isset($teachers))
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->user->name }}</td>
                        @foreach ($columns as $column)
                        @php
                            if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                                continue;
                        @endphp
                        <td>
                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $attribute }}_switch_{{ $teacher->id }}">
                                    <label class="custom-control-label" for="{{ $attribute }}_switch_{{ $teacher->id }}">&nbsp;</label>
                                </div> --}}
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
                @else
                    <tr>
                        <td colspan = {{ count($columns) }}>Select class and section</td>
                    </tr>
                @endif

        </tbody>
    </table>
