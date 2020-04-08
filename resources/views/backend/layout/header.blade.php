<div class="navbar-custom">
    <div class="row align-items-md-center">
        <div class="col-lg-3 col-6 d-md-none">
            <button class="button-menu-mobile open-left disable-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="col-md-8 font-weight-bold h4 d-flex" id = "school_name">
            @php
                $selected_branch_id = school_id();
                $selected_branch = \App\School::find($selected_branch_id);
                echo $selected_branch->name;
            @endphp
            </div>
        </div>
        <div class="col-md-8 font-weight-bold h4 d-none d-md-block" id = "school_name">
            @php
                $selected_branch_id = school_id();
                $selected_branch = \App\School::find($selected_branch_id);
                echo $selected_branch->name;
            @endphp
        </div>
        <div class="col-md-4 col-6">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                        aria-expanded="false">
                        <span class="account-user-avatar">
                            @if (file_exists('backend/images/user_image/'.Auth::user()->id.'.jpg'))
                                <img src="{{'backend/images/user_image/'.Auth::user()->id.'.jpg'}}" alt="user-image" class="rounded-circle">
                            @else
                                <img src="{{ asset('backend/images/avatar.jpg') }}" alt="user-image" class="rounded-circle">
                            @endif
                        </span>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h2 class="text-overflow m-0">{{ Auth::user()->name }}</h2>
                            <small></small>{{ ucfirst(Auth::user()->role) }}</small>
                        </div>

                        <!-- item-->
                        <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('system.settings') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-settings-variant"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lifebuoy"></i>
                            <span>Support</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
    <!-- end Topbar -->
