
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-light">

        <div class="slimscroll-menu">

            <!-- LOGO -->
            <a href="{{ route('dashboard') }}" class="logo text-center">
                <span class="logo-lg">
                <img src="{{'backend/images/logo-dark.png'}}" alt="" height="50">
                </span>
                <span class="logo-sm">
                <img src="{{asset('backend/images/logo-sm.png')}}" alt="" height="16">
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
                    <a href="{{ route('user.index') }}" class="side-nav-link @if(Request::route()->getName() == 'user') active @endif">
                        <i class="dripicons-user-id"></i>
                        <span> {{ translate('users') }} </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('schools.index') }}" class="side-nav-link @if(Request::route()->getName() == 'school') active @endif">
                        <i class="dripicons-user-id"></i>
                        <span> {{ translate('schools') }} </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link @if(Request::route()->getName() == 'settings') active @endif">
                        <i class="dripicons-cutlery"></i>
                        <span> {{ translate('settings') }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li class="side-nav-item">
                                <a href="{{ route('smtp.settings') }}" aria-expanded="false">
                                   {{ translate('SMTP_settings') }} 
                                </a>
                        </li>
                        <li class="side-nav-item">
                                <a href="{{ route('system.settings') }}" aria-expanded="false">
                                   {{ translate('system_settings') }} 
                                </a>
                        </li>
                        <li class="side-nav-item">
                                <a href="{{ route('payment.settings') }}" aria-expanded="false">
                                   {{ translate('payment_settings') }} 
                                </a>
                        </li>
                        <li class="side-nav-item">
                                <a href="{{ route('sms.settings') }}" aria-expanded="false">
                                   {{ translate('SMS_settings') }} 
                                </a>
                        </li>
                    </ul>
                </li>

                
            </ul>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
