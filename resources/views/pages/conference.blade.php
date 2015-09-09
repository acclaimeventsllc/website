@extends('app')

@section('jumbotron'){{ $options->jumbotron }}@stop

@section('stylesheets')
	<link rel="stylesheet" id="styles-location" href="/css/location.css" type="text/css">
	<link rel="stylesheet" id="styles-conference" href="/css/conference.css" type="text/css">
	<link rel="stylesheet" id="styles-speakers" href="/css/speakers.css" type="text/css">
@stop

@section('jsbot')
	<script id="jquery-modal" src="/js/jquery-modal.js"></script>
	<script id="jquery-paralax" src="/js/jquery-paralax.js"></script>
	<script id="jquery-agenda" src="/js/jquery-agenda.js"></script>
	<script id="jquery-countdown" src="/js/jquery-countdown.js"></script>
	<script id="google-maps" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<script id="jquery-maps" src="/js/jquery-maps.js"></script>
@stop

@section('content-01') {{-- EVENT COUNTDOWN --}}
<?php

	$now		= time();
	$timezone	= (!empty($event->timezone) ? ' '.$event->timezone : '');
	$timezone	= " PDT";
	$start		= strtotime($event->start_date.$timezone) - $now;
	$end		= strtotime($event->end_date.$timezone);

	if ($start < 0 || $end < $now) {
		$options['countdown'] = false;
	} else {
		$min 	= 60;
		$hour 	= 60 * $min;
		$day 	= 24 * $hour;

		$left	= $start;

		$days	= floor($left / $day);
		$left	-= $days * $day;

		$hours	= floor($left / $hour);
		$left	-= $hours * $hour;

		$mins	= floor($left / $min);
		$left	-= $mins * $min;

		$secs	= floor($left);
	}

	if ((bool)$event->coming === true) {
		$event->date = 'Coming in '.date('F Y', strtotime($event->start_date.$timezone));
	} else {
		$event->date = date('F j, Y', strtotime($event->start_date.$timezone));
	}
	$event->time = date('g:i a', strtotime($event->start_date));

	$countdown = $event;

?>	<!-- Countdown -->
	<section id="countdown">

		<div class="container">

@if ((bool)$options->countdown === true && isset($event) && is_object($event) && isset($venue) && is_object($venue))
			<ul class="countdown" data-date="{{ $event->start_date }}">
				<li class="countdown-days">
					<div class="countdown-digit">{{ $days }}</div>
					<div class="countdown-label">Days</div>
				</li>
				<li class="countdown-hours">
					<div class="countdown-digit">{{ $hours }}</div>
					<div class="countdown-label">Hours</div>
				</li>
				<li class="countdown-mins">
					<div class="countdown-digit">{{ $mins }}</div>
					<div class="countdown-label">Minutes</div>
				</li>
				<li class="countdown-secs">
					<div class="countdown-digit">{{ $secs }}</div>
					<div class="countdown-label">Seconds</div>
				</li>
			</ul>
@endif
			<h2 class="date">{{ $event->date }}</h2>@if ((bool)$event->coming === false)
			<h4 class="time">{{ $event->time }}</h4>@endif
			<h3 class="address">@if (!empty($venue->venue))<a href="#location" class="move" title="{{ $venue->venue }}">{{ $venue->venue }}</a>@endif</h3>
		</div>

	</section>

@stop

@section('content-02') {{-- ABOUT OUR CONFERENCE --}}
	<section id="about">

		<div class="container">

			<div class="section-title">
				<h2>About Our Conference</h2>
			</div>

			{!! $event->about !!}
			<div class="col-sm-6 col-sm-offset-3">

				<a class="register btn btn-lg btn-primary" href="/register/{{ $event->slug }}">Register Now!</a>

			</div>

@if ((bool)$options->partners === true && !empty($partners->text))
			<div class="partners col-sm-12">
				{!! $partners->text !!}

@if (isset($partners->companies) && is_array($partners->companies))
@foreach ($partners->companies as $partner)
				<a href="{{ $partner->website }}" title="{{ $partner->company }} website" target="_blank"><img src="{{ $partner->photo }}" alt="{{ $partner->company }}"></a>
@endforeach
@endif

			</div>

@endif

		</div>

	</section>


@stop

@section('content-03') {{-- CONFERENCE AGENDA --}}
@if ((bool)$options->agenda === true && isset($agendas) && is_array($agendas))
	<section id="agenda">

		<div class="container">

			<div class="agenda">

@foreach ($agendas as $date => $agenda)<?php

?>				<!-- Agenda for {{ $date }} -->
				<div id="{{ $date }}">

@foreach ($agenda as $time => $slot)<?php $slot['time'] = date('g:i a', strtotime(date('Y-m-d ').$time)); ?>
					<!-- {{ $time }} -->
					<div id="{{ $date }}_{{ $time }}" class="timeslot row">
						<div class="col-md-2">
							<div class="session-time">
								<span>{{ $slot['time'] }}</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="sessions"><?php unset($slot['time']); ?>

@foreach ($slot as $i => $session)
								<div id="session-{{ $session->id }}" class="{{ $session->type }}">@if ($session->type !== 'break')
									<input id="session-{{ $session->id }}-expand" class="expand no-move" type="checkbox">@endif
									<label @if ($session->type !== 'break') for="session-{{ $session->id }}-expand" class="expand"@endif>
										<div class="session-title">{{ $session->title }}</div>@if (strlen($session->subtitle) > 0)
										<div class="session-subtitle">{{ $session->subtitle }}</div>@endif

									</label>
@if ((bool)$options->speakers === true)@if (is_array($session->speakers))
									<div class="session-speakers">

@foreach ($session->speakers as $type => $slugs)
										<div class="session-{{ $type }}">
<?php sort($slugs); ?>
@foreach ($slugs as $slug)
@if (isset($speakers[$slug]))<?php
	$speaker = $speakers[$slug];
	$speakers[$slug]->sessions[] = $date.' '.$time.' '.$i; ?>
											<a class="session-speaker acclaim-text" href="#speaker-{{ $slug }}" title="{{ $speaker->first_name}} {{ $speaker->last_name }}">
												<span class="speaker-name">{{ $speaker->first_name }} {{ $speaker->last_name}}</span>,
												<span class="speaker-title">{{ $speaker->title_short }}</span>,
												<span class="speaker-company">{{ $speaker->company }}</span>
											</a>
@endif
@endforeach
										</div>
@endforeach
									</div>
@endif
@endif
									<div class="read-more">
@if (!empty($session->desc))
										{!! $session->desc !!}
@else
										<p>Session description coming soon...</p>
@endif
									</div>
@if ($session->type !== 'break')
									<label for="session-{{ $session->id }}-expand" class="expand expand-more"></label>@endif

								</div>
@endforeach
							</div>
						</div>
					</div>

@endforeach
				</div>

@endforeach
			</div>

			<div class="col-sm-6 col-sm-offset-3">

				<a class="register btn btn-lg btn-primary" href="/register/{{ $event->slug }}">Register Now!</a>

			</div>

		</div>

	</section>


@endif
@stop

@section('content-04') {{-- CONFERENCE SPEAKERS --}}
@if ((bool)$options->speakers === true && isset($speakers) && (is_array($speakers) || is_object($speakers)))
	<!-- Speakers -->
	<section id="speakers">
		<div class="speakers container">

			<div class="section-title">
				<h2>Speakers</h2>
				<span class="border"></span>
			</div>

			<div class="row">
@foreach ($speakers as $speaker)
				<div class="col-md-4 col-sm-6">
					<input id="speaker-{{ $speaker->slug }}" class="modal-toggle no-move" type="checkbox">
					<div class="speaker">
						<label for="speaker-{{ $speaker->slug }}" class="speaker-image"@if (!empty($speaker->photo)) style="background-image: url('{{ $speaker->photo }}');"@endif><div class="read-bio">Read Bio...</div></label>
						<p class="speaker-name acclaim-text">{{ $speaker->first_name }} {{ $speaker->last_name }}</p>
						<p class="speaker-title">{{ $speaker->title }}</p>
						<p class="speaker-company">{{ $speaker->company }}</p>
						<div class="speaker-sessions">
@if(is_array($speaker->sessions))
@foreach ($speaker->sessions as $string)<?php
@list ($date, $time, $slot) = explode(' ', $string);
$session	= $agendas[$date][$time][$slot];
?>
							<a href="#session-{{ $session->id }}" title="{{ $session->title }}">{{ $session->title_short }}</a>
@endforeach
@endif						</div>
					</div>
					<div class="modal-overlay">
						<div class="vertical">
							<div id="{{ $speaker->slug }}-overlay" class="row">
								<div class="speaker modal-content col-md-6 col-md-offset-3">
									<label for="speaker-{{ $speaker->slug }}" class="modal-close">&#10006;</label>
									<div class="speaker-image"@if (!empty($speaker->photo)) style="background-image: url('{{ $speaker->photo }}');">@endif</div>
									<p class="speaker-name acclaim-text">{{ $speaker->first_name }} {{ $speaker->last_name }}</p>
									<p class="speaker-title">{{ $speaker->title }}</p>
									<p class="speaker-company">{{ $speaker->company }}</p>
									<div class="speaker-bio">
										{!! $speaker->bio !!}
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

@endif
@stop

@section('content-05'){{-- CONFERENCE SPONSORS --}}
	<!--// SPONSORS //-->
	<section id="sponsors">

		<div class="container">
@if ((bool)$options->sponsorlevels !== true)
			<div class="section-title">
				<h2>Sponsors</h2>
				<span class="border"></span>
			</div>

@endif
@if ((bool)$options->sponsors === true && isset($sponsors) && is_object($sponsors))
			<div class="sponsors row">

@if ((bool)$options->sponsorlevels === true)
@foreach ($sponsors as $level => $companies)
				<div class="section-title">
					<h2>{{ $level }} Sponsors</h2>
					<span class="border"></span>
				</div>

@foreach ($companies as $slug => $sponsor)
				<a href="{{ $sponsor->website }}" title="{{ $sponsor->company }}" target="_blank"><img src="{{ $sponsor->photo }}" alt="{{ $sponsor->company }}"></a>
@endforeach
@endforeach

@else
@foreach ($sponsors as $slug => $sponsor)
				<a href="{{ $sponsor->website }}" title="{{ $sponsor->company }}" target="_blank"><img src="{{ $sponsor->photo }}" alt="{{ $sponsor->company }}"></a>

@endforeach
@endif
			</div>

@endif
			<div class="sponsors-contact">
				<h3>Interested in participating as a sponsor?</h3>
				<a class="btn btn-lg btn-primary" href="/contact/sponsorship/{{ $event->slug }}" title="Request Information">Request Information</a>
			</div>

		</div>

	</section>

@stop

@section('content-06') {{-- CONFERENCE LOCATION MAP --}}
@if((bool)$options->venue && isset($venue) && is_object($venue))
	<section id="location">

		<div class="map-canvas" data-place="{{ $venue->place }}"
			@if (!empty($venue->coords) && $options->coords === true)data-coords="{{ $venue->coords }}"@endif
			@if (!empty($venue->address) && $options->address === true)data-address="{{ $venue->address }}"@endif
			@if (!empty($venue->venue) && $options->venue === true)data-venue="{{ $venue->venue }}"@endif>
		</div>
		
		<input id="map-toggle" class="map-toggle modal-toggle no-move" type="checkbox">
		<div class="label-position">
			<label for="map-toggle" class="map-toggle"></label>
		</div>

		<div class="map-overlay">
			<div>
				<div class="vertical">
					<h3 class="venue"><i class="fa fa-arrow-right normal-icon acclaim-text"></i>{{ $venue->venue }}</h3>
					<h3 class="address"><label for="map-toggle">@if (!empty($venue->address))<i class="fa fa-map-marker normal-icon acclaim-text"></i>{{ $venue->address }}@endif</label></h3>
@if (!empty($venue->directions))
					<h3 class="directions"><i class="fa fa-truck normal-icon acclaim-text"></i><a href="{{ $venue->directions }}" title="Driving Directions">Driving Directions</a></h3>
@endif
				</div>
			</div>
		</div>

	</section>
@endif
@stop

