@extends('app')

@section('stylesheets')
	<link rel="stylesheet" id="styles-contact" href="/css/contact.css" type="text/css">
	<link rel="stylesheet" id="styles-location" href="/css/location.css" type="text/css">
@stop

@section('jsbot')
	<script id="jquery-modal" src="/js/jquery-modal.js"></script>
	<script id="jquery-contact" src="/js/jquery-contact.js"></script>

	<script id="google-maps" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<script id="jquery-maps" src="/js/jquery-maps.js"></script>
@stop

@section('content-01')
	<section>@if (!empty($options->title))

		<div class="section-title">
			<h2>{{ $options->title }}</h2>
			<span class="border"></span>
		</div>@endif

		<div class="container">

			<div class="row">

				<div class="contact-info col-sm-6">
@if (!empty($contact->photo))

					<div class="photo row">
						<div class="label col-sm-4"></div>
						<div class="col-sm-8"><img src="{{ $contact->photo }}" alt="{{ $contact->first_name }} {{ $contact->last_name }}"></div>
					</div>
@endif

@if (empty($contact->photo))
					<div class="phone row">
						<div class="label col-sm-4">Phone</div>
						<div class="col-sm-8"><a href="tel:{{ $contact->phone_short }}">{{ $contact->phone }}</a></div>
					</div>

@endif
					<div class="social row">
						<div class="label col-sm-4">Social Media</div>
						<div class="col-sm-8">
							<ul>@if (!empty($contact->facebook))
								<li><a class="facebook" href="{{ $contact->facebook }}" target="_blank"><i class="fa fa-facebook-square fa-lg normal-icon"></i></a></li>@endif
								<li><a class="linkedin" href="{{ $contact->linkedin }}" target="_blank"><i class="fa fa-linkedin-square fa-lg normal-icon"></i></a></li>
							</ul>
						</div>
					</div>

@if (!empty($contact->address))
					<div class="address row">
						<div class="label col-sm-4">Address</div>
						<div class="col-sm-8"><a class="move" href="#location">{!! $contact->address !!}</a></div>
					</div>

@endif
				</div>

				<div class="contact-form col-sm-6">

@if (Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
@endif

					{!! Form::open(['url' => $route->url]) !!}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							{!! Form::label('name', 'Name', ['class' => 'required-field']) !!}
							{!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Your Name']) !!}
							{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							{!! Form::label('email', 'Email', ['class' => 'required-field']) !!}
							{!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
							{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							{!! Form::label('phone', 'Phone') !!}
							{!! Form::text('phone',null,['class' => 'form-control', 'placeholder' => 'Your Phone']) !!}
							{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
							{!! Form::label('message', 'Message', ['class' => 'required-field']) !!}
							{!! Form::textarea('message',null,['class' => 'form-control', 'placeholder' => 'Send ' . (!empty($contact->first_name) ? $contact->first_name : 'us') . ' a message']) !!}
							{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Send Message',['class' => 'btn btn-primary form-control']) !!}
						</div>

					{!! Form::close() !!}

				</div>

			</div>

		</div>

	</section>

@stop

@section('content-02') {{-- LOCATION MAP --}}
	<section id="location">

		<div class="map-canvas" data-place="{{ $contact->place }}"></div>
		
		<input id="map-toggle" class="map-toggle modal-toggle no-move" type="checkbox">
		<div class="label-position">
			<label for="map-toggle" class="map-toggle"></label>
		</div>

		<div class="map-overlay">
			<div>
				<div class="vertical">
					<h3 class="venue"><i class="fa fa-arrow-right normal-icon acclaim-text"></i>{{ $contact->venue }}</h3>
					<h3 class="address"><label for="map-toggle">@if (!empty($contact->address_short ))<i class="fa fa-map-marker normal-icon acclaim-text"></i>{{ $contact->address_short }}@endif</label></h3>
@if (!empty($contact->directions ))
					<h3 class="directions"><i class="fa fa-truck normal-icon acclaim-text"></i><a href="{{ $contact->directions }}" title="Driving Directions">Driving Directions</a></h3>
@endif
				</div>
			</div>
		</div>

	</section>
@stop

