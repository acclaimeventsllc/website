@extends('app')

@section('stylesheets')
	<link rel="stylesheet" id="styles-about" href="/css/about.css" type="text/css">
	<link rel="stylesheet" id="styles-speakers" href="/css/speakers.css" type="text/css">
	<link rel="stylesheet" id="styles-advisors" href="/css/advisors.css" type="text/css">
@stop

@section('jsbot')
	<script id="jquery-modal" src="/js/jquery-modal.js"></script>
@stop

@section('content-01') {{-- ABOUT ACCLAIM EVENTS --}}
	<section id="about" class="section-alternating">

		<div class="container">

			<div class="section-title">
				<h2>About Acclaim Events</h2>
				<span class="border"></span>
			</div>

			{!! $about !!}

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
							<div class="vertical">
								<a href="/contact/{{ strtolower($person->first_name) }}" title="Email {{ ucwords($person->first_name) }}">Contact {{ ucwords($person->first_name) }}</a>
							</div>
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

		<div class="speakers container">

			<div class="section-title">
				<h2>National Advisors</h2>
				<span class="border"></span>
			</div>

			<div class="row">
@foreach($advisors as $advisor)
				<div class="col-md-4 col-sm-6">
					<input id="speaker-{{ $advisor->slug }}" class="modal-toggle speaker-toggle no-move" type="checkbox">
					<div class="speaker">
						<label for="speaker-{{ $advisor->slug }}" class="speaker-image"@if (!empty($advisor->photo)) style="background-image: url('{{ $advisor->photo }}');"@endif><div class="read-bio">Read Bio...</div></label>
						<p class="speaker-name acclaim-text">{{ $advisor->first_name }} {{ $advisor->last_name }}</p>
						<p class="speaker-title">{{ $advisor->title }}</p>
						<p class="speaker-company">{{ $advisor->company }}</p>
					</div>
					<div class="modal-overlay">
						<div class="vertical">
							<div id="{{ $advisor->slug }}-overlay" class="row">
								<div class="speaker modal-content col-md-6 col-md-offset-3">
									<label for="speaker-{{ $advisor->slug }}" class="modal-close">&#10006;</label>
									<div class="speaker-image"@if (!empty($advisor->photo)) style="background-image: url('{{ $advisor->photo }}');"@endif>&nbsp;</div>
									<p class="speaker-name acclaim-text">{{ $advisor->first_name }} {{ $advisor->last_name }}</p>
									<p class="speaker-title">{{ $advisor->title }}</p>
									<p class="speaker-company">{{ $advisor->company }}</p>
									<div class="speaker-bio">
										{!! $advisor->bio !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
@endforeach

			</div>

		</div>

	</section>
@stop

