@auth()
    @include('signon.layouts.navbars.navs.auth')
@endauth
    
@guest()
    @include('signon.layouts.navbars.navs.guest')
@endguest