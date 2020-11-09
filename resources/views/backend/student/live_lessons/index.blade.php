<!-- 
**STILL A WORK IN PROGRESS, decided to make public to give a little teaser**

I personally renamed these cards: Concord Cards. 
Its named after the definition and after the british Airlines concord jet because of how fast and convenient. Though it did combust 🤔. Lets hope mine doesn't.-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Live Lessons</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0;">
	<link href="{{ asset('css/student_live.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="">
	@php
                $login = Auth::user()->id;
                $student = \App\Student::where('user_id', $login)->first();
                $live_lessons = App\Livelesson::where(['school_id' => school_id(), 'session' => get_schools()])->get();
                $selected_branch_id = school_id();
                $selected_branch = \App\School::find($selected_branch_id);
                
            @endphp
	<main class="concord" id="concord-cards">
		<header>
			<time>
				<a href="dash"><avatar style="background-image:url({{ asset('media/home1.png') }}" alt=""></avatar>
			</a>
			</time>
			<a href="#"><avatar style="background-image:url({{ 'backend/images/student_image/'.$student->profile_pix.'.jpg' }}" alt="{{Auth::user()->name}})"></avatar>
			</a>
		</header>
		<div class="content">
			</div>
		<header>
			<time>
				<h5 id="date">{{ $time->isoFormat('MMMM DD') }}</h5>
				@if( $time->isoFormat('DD') === $time->isoFormat('DD'))
				<h3 id="day">Today</h3>
				@else
				<h3 id="day">{{ $set->isoFormat('dddd') }}</h3>
				@endif
			</time>
			
		</header>
		<!--
Card = Original Card white bttom
Card i = Icon/Image with price
Card x = Card without icon and footer
Card V = Card with video-->
@if (count($live_lessons) > 0)
	@foreach ($live_lessons as $live)
		
		<div class="card xl i">
			<input type="button" class="concord exit" value="×"/>
			<section class="wrapper">
				<img style="background-color: #FED8C1; background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/565097/mountain-landscape-vector.png);" alt=""></img>
				<header class="card-title">
					<img class="icon" style="background-image: url({{ asset('backend/images/user_image/'.$live->user->id.'.jpg') }});"></img>
					<h2>{{ $live->topic }}</h2>
				</header>
				<footer class="card-footer">
					<h6>{{ $live->user->other_name }} {{ $live->user->first_name }} {{ $live->user->middle_name }}</h6>
					<p>{{ $live->subject->name }}</p>
					<input type="button" class="concord" value="JOIN"></input>
				</footer>
			</section>
			<div class="content">
			</div>
		</div>
		<div class="card x" data-color="" style="">
			<input type="button" class="concord exit" value="×"/>
			<section class="wrapper">
				<img style="background-color: #ffcbb6; background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/565097/city-landscape-vector.png)" alt=""></img>
				<header class="card-title">
					<h6>Life Hack</h6>
					<h4>Stitch Screenshots the Easy Way</h4>
				</header>
				<footer class="card-footer">
					<p>Tap to learn how to save long web paes and chat threads.</p>
				</footer>
			</section>
			<div class="content">
				<p><b>Lorem ipsum dolor sit amet</b> consectetur adipiscing elit. Quisque lacinia, turpis ac congue vehicula, ipsum enim semper neque, nec ultrices mauris dui non neque. Phasellus libero purus, viverra sit amet consectetur at, sagittis vel turpis. Quisque nec nulla quis neque pharetra
					volutpat. Etiam sodales odio eu eros dictum efficitur. </p>
				<img alt="" style="background-image:url(https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=64aea2d5c42b610bb0ed8aede22c2507)"/>
				<p>In elementum finibus dui, ac rutrum ante consectetur sit amet. Aenean mauris sem, pulvinar vel tempor vel, volutpat sed turpis. Vestibulum arcu est, blandit ac ex et, ultrices consequat est.</p>
			</div>
		</div>
		@endforeach
		@endif
	</main>
	<script src="{{ asset('js/student_live.js') }}"></script>
</body>
</html>