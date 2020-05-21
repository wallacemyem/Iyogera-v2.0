<h5 class="text-center">{{ $teacher_details->user->name }}</h5>

@foreach ($permissions as $permission)
<table class="table table-hover table-centered mb-0" style="margin-bottom: 50px !important; background-color: #FAFAFA;">
    @php
        $attributes = array_keys($permission->getAttributes());
    @endphp

    <tbody>
        @foreach ($attributes as $key => $attribute)
            @php
                if ($attribute == 'created_at' || $attribute == 'updated_at' || $attribute == 'teacher_id' || $attribute == 'id')
                    continue;
            @endphp
            <tr>
                @if ($attribute == 'class_id')
                    <td style="font-weight: bold;">{{ translate('class') }}</td>
                    <td style="font-weight: bold;">
                        {{ \App\Classes::find($permission[$attribute])->name }}
                    </td>
                @elseif ($attribute == 'section_id')
                    <td style="font-weight: bold;">{{ translate('section') }}</td>
                    <td style="font-weight: bold;">
                        {{ \App\Section::find($permission[$attribute])->name }}
                    </td>
                @else
                    <td style="font-weight: bold;">{{ ucfirst(str_replace('_', ' ', $attribute)) }}</td>
                    <td style="font-weight: bold;">
                        @if ($permission[$attribute] == 1)
                            <i class="fas fa-circle" style="color: green;"></i>
                        @else
                            <i class="fas fa-circle" style="color: red;"></i>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endforeach
@if (count($permissions) == 0)
    <p class = "text-center">{{ translate('no_permission_assigned_yet') }}</p>
@endif
<a href="{{ route('permission.index') }}" class="btn btn-info btn-block">{{ translate('update_permissions') }}</a>

