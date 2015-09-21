@extends('app')

@section('stylesheets')
	<link rel="stylesheet" id="styles-conferences" href="/css/conferences.css" type="text/css">
@stop

@section('content-01'){{-- DISPLAY MULTIPLE CONFERENCES --}}
	<section id="conferences" class="section-alternating">

		<div class="section-title">
			<h2>Upcoming Conferences</h2>
			<span class="border"></span>
		</div>

		<div class="container">

			<div class="conferences row">

@if (is_array($events))
@foreach ($events as $event)<?php
	if (!empty($event->coming)) {
		$event->date = $event->coming;
		$event->date = date('F Y', strtotime($event->start_date.(!empty($event->timezone) ? ' '.$event->timezone : '')));
	} elseif (!empty($event->start_date) && $event->start_date !== '0000-00-00 00:00:00') {
		$event->date = date('M j, Y', strtotime($event->start_date.(!empty($event->timezone) ? ' '.$event->timezone : '')));
	} else {
		$event->date = 'Date TBA';
	}

?>				<div class="conference col-sm-4">
					<a href="/conferences/{{ $event->slug }}"@if (!empty($event->photo)) style="background-image: url('{{ $event->photo }}');"@endif>
						<div class="shader">
							<div class="vertical">
								<h3>{{ $event->city }}, {{ $event->state }}</h3>
								<h4>{{ $event->date }}</h4>@if (!empty($event->venue_slug) && !empty($venues[$event->venue_slug]))
								<h5>{{ $venues[$event->venue_slug]->venue }}</h5>@endif
							</div>
						</div>
					</a>
				</div>

@endforeach
@endif
			</div>

		</div>

	</section>

@stop

@section('content-02'){{-- DISPLAY PAST CONFERENCES --}}
	<section id="past-conferences" class="section-alternating">

		<div class="section-title">
			<h2>Past Conferences</h2>
			<span class="border"></span>
		</div>

		<div class="container">

			<div class="conferences row">

@if (is_array($past))
@foreach ($past as $event)<?php

	if (!empty($event->coming)) {
		$event->date = $event->coming;
		$event->date = date('F Y', strtotime($event->start_date.(!empty($event->timezone) ? ' '.$event->timezone : '')));
	} elseif (!empty($event->start_date) && $event->start_date !== '0000-00-00 00:00:00') {
		$event->date = date('M j, Y', strtotime($event->start_date.(!empty($event->timezone) ? ' '.$event->timezone : '')));
	} else {
		$event->date = 'Date TBA';
	}

?>				<div class="conference col-sm-4">
					<a href="/conferences/{{ $event->slug }}"@if (!empty($event->photo)) style="background-image: url('{{ $event->photo }}');"@endif>
						<div class="shader">
							<div class="vertical">
								<h3>{{ $event->city }}, {{ $event->state }}</h3>
								<h4>{{ $event->date }}</h4>@if (!empty($event->venue_slug) && !empty($venues[$event->venue_slug]))
								<h5>{{ $venues[$event->venue_slug]->venue }}</h5>@endif
							</div>
						</div>
					</a>
				</div>

@endforeach
@endif
			</div>

		</div>

	</section>

@stop


