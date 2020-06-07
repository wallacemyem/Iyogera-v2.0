
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-light">

        <div class="slimscroll-menu">

            <!-- LOGO -->
            <a href="{{ route('dashboard') }}" class="logo text-center">
                <span class="logo-lg">
                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="50">
                </span>
                <span class="logo-sm">
                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="16">
                </span>
            </a>
            <!--- Sidemenu -->
            <ul class="metismenu side-nav side-nav-light">
                <li class="side-nav-title side-nav-item">{{ translate('navigation') }}</li>
                <li class="side-nav-item">
                    <a href="{{ route('dashboard') }}" class="side-nav-link @if(Request::route()->getName() == 'dashboard') active @endif">
                        <i class="dripicons-view-apps"></i>
                        <span> {{ translate('dashboard') }} </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('student.index') }}" class="side-nav-link @if(Request::route()->getName() == 'student') active @endif">
                        <i class="dripicons-user-id"></i>
                        <span> {{ translate('student') }} </span>
                    </a>
                </li>

                @foreach (\App\Menu::where('parent', 0)->where('status', 1)->get() as $menu)
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link @if(Request::route()->getName() == 'student.bulk' && $menu->id == 3) active @elseif(Request::route()->getName() == 'student.excel' && $menu->id == 3) active @endif">
                        <i class="{{ $menu->icon }}"></i>
                        <span> {{ ucfirst(str_replace('_', ' ', translate($menu->displayed_name))) }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        @foreach (\App\Menu::where('parent', $menu->id)->where('status', 1)->orderBy('sort_order', 'ASC')->get() as $sub_menu)

                        @if (count(\App\Menu::where('parent', $sub_menu->id)->where('status', 1)->get()) > 0 )
                            <li class="side-nav-item">
                                <a href="javascript: void(0);" aria-expanded="false">{{ ucfirst(str_replace('_', ' ', translate($sub_menu->displayed_name))) }}
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="side-nav-third-level" aria-expanded="false">
                                    @foreach (\App\Menu::where('parent', $sub_menu->id)->where('status', 1)->orderBy('sort_order', 'ASC')->get() as $sub_sub_menu)
                                        <li>
                                            <a href="{{ $sub_sub_menu->route_name == '' ? route('dashboard') : route($sub_sub_menu->route_name)  }}">{{ ucfirst(str_replace('_', ' ', translate($sub_sub_menu->displayed_name))) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li @if(Request::route()->getName() == 'student.bulk' && $sub_menu->route_name == 'student.create') class="active" @endif>
                                <a href="{{ $sub_menu->route_name == '' ? route('dashboard') : route($sub_menu->route_name)  }}" @if(Request::route()->getName() == 'student.bulk' && $sub_menu->route_name == 'student.create') class="active" @elseif(Request::route()->getName() == 'student.excel' && $sub_menu->route_name == 'student.create') class="active" @endif>{{ ucfirst(str_replace('_', ' ', translate($sub_menu->displayed_name))) }}</a>
                            </li>
                        @endif

                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
