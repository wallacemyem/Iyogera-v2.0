@extends('backend.layout.live')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">

            <button id="start" class="btn btn-primary" type="button">Start</button>
            <div class="responsive-sm" id="jitsi-container">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        var button = document.querySelector('#start');
        var container = document.querySelector('#jitsi-container');
        var api = null;
        var topic = '{{$topic}}';
        var live_url = '{{$live_url}}';
        var password  = '{{$password}}';
        var name = '{{ Auth::user()->other_name }} {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} ';
        var email = '{{ Auth::user()->email }}'
        var avater = '{{ asset('backend/images/user_image/'.Auth::user()->id.'.jpg') }}';

        button.addEventListener('click', () => {
            
            var domain = "xl2r.iyogera.com";
            var options = {
                "roomName": live_url,
                "parentNode": container,
                "width": 700,
                "height": 550,
                configOverwrite: { startWithAudioMuted: false },
                
            };
            
            api = new JitsiMeetExternalAPI(domain, options);
            api.on('participantRoleChanged', (event) => {
                if (event.role === 'moderator') {
                    api.executeCommand('password', password)
                }
            });
            api.executeCommand('subject', topic);
            api.executeCommand('avatarUrl', avater);
            api.executeCommand('displayName', name);
            api.executeCommand('email', email);
             api.on('readyToClose', (event) => {
                api.dispose()
                window.close();
            })
            
        });

    </script>
@endsection
