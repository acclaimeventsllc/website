@extends('app')

@section('subtitle')<h2>Networking for IT executives</h2> @stop

@section('stylesheets')
	<link rel="stylesheet" id="styles-home" href="/css/home.css" type="text/css">
@stop

@section('jsbot'){{--
	<script id="jquery-paralax" src="/js/jquery-paralax.js"></script>--}}
	<script id="jquery-carousel" src="/js/jquery-carousel.js"></script>
@stop

@section('content-01') {{-- UPCOMING EVENTS --}}
	<section id="upcoming-events" class="section-alternating">

			<div class="row events-container">

				<div class="col-xs-12">

@foreach ($events as $event)
@if (!empty($event->options->show_upcoming) && (bool)$event->options->show_upcoming === true)
<?php $date = date('F Y', strtotime($event->start_date)); ?>
@elseif (!empty($event->start_date) && $event->start_date !== '0000-00-00 00:00:00')
<?php $date = date('F j, Y', strtotime($event->start_date)); ?>
@else
<?php $date = 'Coming Soon!'; ?>
@endif
					<div class="event col-sm-4">
						<a class="event-link" href="/conferences/{{ $event->slug }}" title="{{ $event->conference }}">
							<div class="event-background" style="background-image: url('{{ $event->photo }}');">
								<div class="shader">
									<div class="vertical">
										<h2 class="event-title">{{ $event->city }}, {{ $event->state }}</h2>
										<h3 class="event-date">{{ $date }}</h3>
										<p class="event-location">@if (!empty($venues[$event->venue_slug]->venue)){{ $venues[$event->venue_slug]->venue }}@else &nbsp; @endif</p>
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

@endforeach
				</div>

			</div>

	</section>

@stop

@section('content-02') {{-- OPPORTUNITIES --}}
{{--}}
	<section id="opportunities" class="opportunities section-alternating">

		<div class="container">

			<div class="section-title">
				<h2>Event Opportunities</h2>
				<span class="border"></span>
			</div>

			<div class="row">

				<div class="opportunities-attendees col-sm-4">
					<h2>Attendees</h2>
					<p>Network with other IT Executives in the local Community:
						<ul>
							<li>CIOs</li>
							<li>CTOs</li>
							<li>CSOs</li>
							<li>VP of IT</li>
							<li>IT Directors</li>
							<li>Sr. Level IT Executives</li>
						</ul>
					</p>
					<a href="/register/{{ $events[0]->slug }}" class="btn btn-primary">Register Now</a>
				</div>

				<div class="opportunities-sponsors col-sm-4">
					<h2>Sponsors</h2>
					<p>Network with powerful &amp; influential IT Executives from the local community.</p>
					<a href="/contact/sponsorship/{{ $events[0]->slug }}" class="btn btn-primary">Contact Us</a>
				</div>

				<div class="opportunities-speaking col-sm-4">
					<h2>Speaking</h2>
					<p>Do you have expertise and passion around one of the event topics and would like to be considered as a presenter? We would love to hear from you.</p>

					<div class="oppotrunities-contact">
						<p>
							Contact:<br />
							<strong>Bob Fritz</strong><br />
							503-206-5700<br />
						</p>
							<a href="/contact/bob" class="btn btn-primary">Email Bob</a>
					</div>
				</div>

			</div>

		</div>

	</section>
{{--}}
@stop

@section('content-03') {{-- WHO SHOULD ATTEND --}}

	<section id="benefits" class="section-alternating">

		<div class="container">

			<div class="section-title">
				<h2>@if (!empty($intro->title)){!! $intro->title !!}@else About our Conferences @endif</h2>
				<span class="border"></span>
			</div>

			@if (!empty($intro->text)){!! $intro->text !!}@endif

@foreach ($benefits as $i => $benefit)
@if ($i%2 === 0)
			<div class="row">

@endif
				<div class="about-events col-sm-6">
					<h3><span>{{ $benefit->title }}</span></h3>
					{!! $benefit->text !!}
				</div>

@if ($i%2 > 0)
			</div>
			
@endif

@endforeach
			</div>

		</div>

	</section>

@stop

@section('content-04') {{-- TESTIMONIALS --}}
	<section id="testimonials" class="paralax jumbotron jumbotron-testimonials">

		<div class="paralax-background carousel">

			<div class="container">

				<div class="carousel-slides">
					<a class="carousel-nav carousel-prev" href="#" title="Previous Testimonial"><i class="fa fa-chevron-left"></i></a>
					<a class="carousel-nav carousel-next" href="#" title="Next Testimonial"><i class="fa fa-chevron-right"></i></a>
					<ul class="testimonials">

@foreach ($testimonials as $testimonial)
						<li>
							<div>
								<h2 class="testimonials-quote"><i class="fa fa-quote-left"></i>{{ $testimonial->quote }}<i class="fa fa-quote-right"></i></h2>
								<p class="testimonials-author"> - {{ $testimonial->author }}@if (!empty($testimonial->title)), {{ $testimonial->title }}@endif of {{ $testimonial->company }} - </p>
							</div>
						</li>

@endforeach
					</ul>

				</div>

			</div>

		</div>

	</section>

@stop
