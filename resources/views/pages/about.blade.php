@extends('app')

@section('stylesheets')
	<link rel="stylesheet" id="styles-about" href="/css/about.css" type="text/css">
	<link rel="stylesheet" id="styles-speakers" href="/css/speakers.css" type="text/css">
	<link rel="stylesheet" id="styles-advisors" href="/css/advisors.css" type="text/css">
@stop

@section('jsbot')
	<script id="jquery-speakers" src="/js/jquery.speakers.js"></script>
@stop

@section('content-01') {{-- ABOUT ACCLAIM EVENTS --}}
	<section id="about" class="section-alternating">

		<div class="container">

			<div class="section-title">
				<h2>Acclaim Events - Who we are!</h2>
				<span class="border"></span>
			</div>

			<div class="bullet-points">

				{!! $about !!}

			</div>

			<br><br><br><br>

			<div class="section-title">
				<h2>Acclaim Events - Who we are!</h2>
				<span class="border"></span>
			</div>

			<p>Established in 2013, Acclaim Events was created to help Information Technology Executives find solutions too many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among information technology leaders will help expand IT knowledge within the local community. With over 20 years of combined experience facilitating IT conferences, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences. The core of our company is based and founded on the following principals:</p>

			<div class="features">

				<div class="row">

					<div class="col-sm-4 feature">
						<div class="feature-inside">
							<div class="feature-title">
								<h3>INTEGRITY</h3>
							</div>
							<div class="feature-content">
								<p>We believe in “saying what we do and doing what we say.” This creates a working relationship with our attendees and our sponsors so they always know what to expect when attending our conferences.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 feature">
						<div class="feature-inside">
							<div class="feature-title">
								<h3>HIGH STANDARDS &amp; EXPECTATIONS</h3>
							</div>
							<div class="feature-content">
								<p>“Our expectations are high and so should yours be.” We strive to have the highest quality topics, discussions and speakers at our conferences so that our attendees and sponsors are able to gain value from participation.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 feature">
						<div class="feature-inside">
							<div class="feature-title">
								<h3>SHARING OF KNOWLEDGE</h3>
							</div>
							<div class="feature-content">
								<p>The sharing of knowledge and information is a core principle of our organization, providing high quality educational information keeps our attendees coming back year after year.</p>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	</section>

@stop

@section('content-02') {{-- MEET OUR TEAM --}}
	<section id="team" class="section-alternating">

		<div class="container">

			<div class="section-title">
				<h2>Meet Our Team</h2>
				<span class="border"></span>
			</div>

			<ul class="profiles">

@foreach ($team as $person)
				<li class="profile">
					<div class="profile-hover">
						<div class="profile-pic" style="background-image: url('{{ $person->photo }}');"><div class="contact"></div></div>
						<div class="profile-contact">
							<a href="/contact/{{ strtolower($person->first_name) }}" title="Email {{ ucwords($person->first_name) }}">Contact {{ ucwords($person->first_name) }}</a>
						</div>
						<div class="profile-info acclaim-box">
							<p class="profile-name">{{ $person->first_name }} {{ $person->last_name }}</p>
							<p class="profile-title">{!! $person->title !!}</p>
						</div>
					</div>
				</li>

@endforeach
			</ul>

		</div>

	</section>

@stop

@section('content-03') {{-- NATIONAL ADVISORY BOARD --}}
	<section id="advisors" class="section-alternating">

		<div class="section-title">
			<h2>National Advisors</h2>
			<span class="border"></span>
		</div>

		<div class="speakers container">

			<input id="modal-speaker" class="modal-toggle no-move" type="checkbox">

			<div class="modal-overlay">
				<div class="vertical">
					<div class="container">
						<div class="row modal-content">
							<label for="modal-speaker" class="modal-close">&#10006;</label>
							<div class="noscript">
								This feature requires Javascript to be turned on.
							</div>
							<div class="speaker">
								<label for="modal-speaker"><div class="speaker-image">&nbsp;</div></label>
								<p class="speaker-name acclaim-text"></p>
								<p class="speaker-title"></p>
								<p class="speaker-company"></p>
								<div class="speaker-bio"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">

@foreach($advisors as $speaker)
				<div class="col-md-4 col-sm-6">
					<div id="speaker-{{ $speaker->slug }}" class="speaker">
						<label for="modal-speaker" class="speaker-image modal-toggle" data-target="modal-speaker"@if (!empty($speaker->photo)) style="background-image: url('{{ $speaker->photo }}');"@endif><div class="read-bio">Read bio...</div></label>
						<p class="speaker-name acclaim-text">{{ $speaker->first_name }} {{ $speaker->last_name }}</p>
						<p class="speaker-title">{{ $speaker->title }}</p>
						<p class="speaker-company">{{ $speaker->company }}</p>
						<div class="speaker-bio">
							{!! $speaker->bio !!}
						</div>
					</div>
				</div>
@endforeach

			</div>

		</div>

	</section>
@stop

