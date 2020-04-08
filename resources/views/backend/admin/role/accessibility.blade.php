@php
    if ($accessibilites) {
        $accessible = json_decode($accessibilites);
    }else {
        $accessible = array();
    }
@endphp

<form method="POST" class="d-block ajaxForm" action="{{ route('accessibility.update', $role) }}">
    @csrf
    @method('PATCH')
    <div class="form-group col-md-12" style="padding-left: 0px;">
        @foreach (\App\Menu::where('parent', 0)->where('status', 1)->get() as $menu)
            <div class="mt-3">
                <h5 class="header-title mt-5 mt-sm-0">{{ ucfirst(str_replace('_', ' ', $menu->displayed_name)) }}</h5>
                @foreach (\App\Menu::where('parent', $menu->id)->where('status', 1)->orderBy('sort_order', 'ASC')->get() as $sub_menu)
                    @if (count(\App\Menu::where('parent', $sub_menu->id)->where('status', 1)->get()) > 0 )
                        <div class="mt-3">
                            <h5 class="header-title mt-5 mt-sm-0">{{ ucfirst(str_replace('_', ' ', $sub_menu->displayed_name)) }}</h5>
                            @foreach (\App\Menu::where('parent', $sub_menu->id)->where('status', 1)->orderBy('sort_order', 'ASC')->get() as $sub_sub_menu)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $sub_sub_menu->id }}" name="accessibility[]" value="{{ $sub_sub_menu->id }}"
                                    @if (in_array($sub_sub_menu->id, $accessible))
                                        checked
                                    @endif>
                                    <label class="custom-control-label" for="{{ $sub_sub_menu->id }}">{{ ucfirst(str_replace('_', ' ', $sub_sub_menu->displayed_name)) }}</label>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{ $sub_menu->id }}" name="accessibility[]" value="{{ $sub_menu->id }}"
                            @if (in_array($sub_menu->id, $accessible))
                                checked
                            @endif>
                            <label class="custom-control-label" for="{{ $sub_menu->id }}">{{ ucfirst(str_replace('_', ' ', $sub_menu->displayed_name)) }}</label>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="form-group col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Update User Role Accessibility</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'role_content');
    });
</script>

