@extends('app')

@section('stylesheets')
	<link rel="stylesheet" id="styles-register" href="/css/register.css" type="text/css">
@stop

@section('jsbot')
	<script id="jquery-register" src="/js/jquery-registers.js"></script>@if ($step->step === 3)
	<script id="jquery-smartystreets" src="//d79i1fxsrar4t.cloudfront.net/jquery.liveaddress/2.8/jquery.liveaddress.min.js"></script>
	<script>
		jQuery.LiveAddress({
			key: {{ env('SMARTYSTREETS_KEY') }},
			autocomplete: 5,
			autoVerify: false
		});
	</script>@endif
@stop

@section('content-01'){{-- OPEN THE SECTION --}}
	<section id="register">

		<div class="container">

			<div class="section-title">
				<h2>Registration</h2>
				<span class="border"></span>
			</div>

@stop

@section('content-02'){{-- PROGRESS BAR --}}
@if ($step->step <= $step->max)
			<ul class="progressbar">

@if (is_array($step->titles))
@foreach($step->titles as $i => $title)
@if ($i <= $step->step)
				<li class="active"><a href="/register/{{ $i }}" title="{{ $title }}">{{ $title }}</a></li>
@elseif ($i <= $step->max)
				<li>{{ $title }}</li>
@endif
@endforeach
@endif

			</ul>

@endif
@stop

@section('content-03'){{-- DEBUGGING --}}
@if ($step->debug === true)
			<pre class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				{!! print_r(\Session::all(), 1) !!}
			</pre>

@endif
@stop

@section('content-04'){{-- OPEN FORM --}}
@if ($step->step <= $step->max)
			{!! Form::open(['url' => '/register/{{ $step->step }}']) !!}

				<div class="register col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

					<fieldset class="step-{{ $step->step }}">

						<legend> {{ $step->titles[$step->step] }}</legend>

@endif
@stop

@section('content-05'){{-- BASIC INFORMATION --}}
						<div class="form-group{{ $errors->has('conference') ? ' has-error' : '' }}">
							{!! Form::label('conference', 'Choose a conference') !!}
							{!! Form::select('conference', $step->events, $step->defaults->conference, ['class' => 'form-control']) !!}
							{!! $errors->first('conference', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('attendance') ? ' has-error' : '' }}">
							{!! Form::label('attendance', 'Attendee type') !!}
							{!! Form::select('attendance', $step->attendance,  $step->defaults->attendance, ['class' => 'form-control']) !!}
							{!! $errors->first('attendance', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							{!! Form::label('email', 'Email') !!}
							{!! Form::email('email',  $step->defaults->email, ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
							{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							{!! Form::label('phone', 'Phone') !!}
							{!! Form::text('phone',  $step->defaults->phone, ['class' => 'form-control', 'placeholder' => 'Your Phone']) !!}
							{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
						</div>

@stop

@section('content-06'){{-- BADGE DETAILS --}}
{{--}}						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							{!! Form::label('first_name', 'First Name') !!}
							{!! Form::text('first_name', $step->defaults->first_name, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							{!! Form::label('last_name', 'Last Name') !!}
							{!! Form::text('last_name', $step->defaults->last_name, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
							{!! Form::label('company', 'Company') !!}
							{!! Form::text('company', $step->defaults->company, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('company', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							{!! Form::label('title', 'Title') !!}
							{!! Form::text('title', $step->defaults->title, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('tagitm') ? ' has-error' : '' }}">
							{!! Form::checkbox('tagitm', 'Yes', $step->defaults->tagitm, ['id' => 'tagitm', 'class' => 'form-control']) !!}
							{!! Form::label('tagitm', 'I am a TAGITM member') !!}
							{!! $errors->first('tagitm', '<p class="help-block">:message</p>') !!}
						</div>
{{--}}
@stop

@section('content-07'){{-- ATTENDEE ADDRESS --}}
{{--}}						<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
							{!! Form::label('street', 'Street') !!}
							{!! Form::text('street', $step->defaults->street, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('street', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
							{!! Form::label('city', 'City') !!}
							{!! Form::text('city', $step->defaults->city, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
							{!! Form::label('state', 'State') !!}
							{!! Form::text('state', $step->defaults->state, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group{{ $errors->has('postal') ? ' has-error' : '' }}">
							{!! Form::label('postal', 'Zip Code') !!}
							{!! Form::text('postal', $step->defaults->postal, ['class' => 'form-control', 'required' => '']) !!}
							{!! $errors->first('postal', '<p class="help-block">:message</p>') !!}
						</div>
{{--}}
@stop

@section('content-08'){{-- DIRECT REPORTS --}}
{{--}}						<div class="form-group{{ $errors->has('referral') ? ' has-error' : '' }}">
							{!! Form::label('referral', 'Name, Title, Phone, Email') !!} <span>(optional)</span>
							{!! Form::textarea('referral', $step->defaults->referrals, ['class' => 'form-control']) !!}
							{!! $errors->first('referral', '<p class="help-block">:message</p>') !!}
						</div>
{{--}}
@stop

@section('content-09'){{-- REGISTRATION CONFIRMATION --}}{{--}}
@if ($step->step === $step->max)
						<div class="confirm-wrapper">

							<h5>Conference Choices <a href="/register/1" title="Edit Step 1">Edit</a></h5>
							
							<div class="col-sm-2 label">Conference</div>
							<div class="col-sm-10 conference">{{ $step->defaults->conference }}</div>

							<div class="col-sm-2 label">Attendee</div>
							<div class="col-sm-10 attendee">{{ $step->defaults->attendee }}</div>
							
							<div class="col-sm-2 label">Email</div>
							<div class="col-sm-10 email">{{ $step->defaults->email }}</div>

							<div class="col-sm-2 label ">Phone</div>
							<div class="col-sm-10 phone">{{ $step->defaults->phone }}</div>

						</div>

						<div class="confirm-wrapper">

							<h5>Badge Details <a href="/register/2" title="Edit Step 2">Edit</a></h5>
							
							<div class="col-sm-2 label">First Name</div>
							<div class="col-sm-10 first-name">{{ $step->defaults->first_name }}</div>

							<div class="col-sm-2 label">Last Name</div>
							<div class="col-sm-10 last-name">{{ $step->defaults->last_name }}</div>
							
							<div class="col-sm-2 label">Title</div>
							<div class="col-sm-10 title">{{ $step->defaults->title }}</div>

							<div class="col-sm-2 label ">Company</div>
							<div class="col-sm-10 company">{{ $step->defaults->company }}</div>

							<div class="col-sm-2 label ">TAGITM member?</div>
							<div class="col-sm-10 tagitm">{{ $step->defaults->tagitm }}</div>

						</div>

						<div class="confirm-wrapper">

							<h5>Address <a href="/register/3" title="Edit Step 3">Edit</a></h5>
							
							<div class="col-sm-2 label">Street</div>
							<div class="col-sm-10 street">{{ $step->defaults->street }}</div>

							<div class="col-sm-2 label">City</div>
							<div class="col-sm-10 city">{{ $step->defaults->city }}</div>
							
							<div class="col-sm-2 label">State</div>
							<div class="col-sm-10 state">{{ $step->defaults->state }}</div>

							<div class="col-sm-2 label ">Postal</div>
							<div class="col-sm-10 postal">{{ $step->defaults->postal }}</div>

						</div>

						<div class="confirm-wrapper">

							<h5>Direct Reports <a href="/register/4" title="Edit Step 4">Edit</a></h5>
							
							<div class="confirm-reports">{{ $step->defaults->referrals }}</div>

						</div>

@endif{{--}}
@stop

@section('content-10'){{--}}
@if ($step->step > $step->max)
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

				<fieldset class="step-{{ ($step->max + 1) }}">

					<legend>{{ $step->titles[$step->step] }}</legend>

					<div class="alert alert-success">
						We have received your conference registration and will contact you within 2 business days.
					</div>

					<div class="confirmation-links">
						In the meantime, please enjoy the rest of our site by clicking one of the links below.
					</div>

					<div class="confirmation-links">
						<a href="/" title="Acclaim Events Home">Home</a> |
						<a href="/conferences/{{ $step->defaults->conference }}" title="Agenda">Agenda for {{ $step->events[$step->defaults->conference] }}</a> |
						<a href="/conferences" title="Other Conferences">Conferences</a> |
						<a href="/contact" title="Contact Us">Contact Us</a>
					</div>


				</fieldset>

			</div>

		</div>

	</section>

@endif{{--}}
@stop

@section('content-15'){{-- CLOSE THE FORM AND SECTION --}}
@if ($step->step <= $step->max)
						<div class="form-group">
							{!! Form::label('', '') !!}
@if ($step->step < $step->max)
							{!! Form::submit('Next Step', ['class' => 'btn btn-primary form-control']) !!}
@else
							{!! Form::submit('Confirm Registration', ['class' => 'btn btn-primary form-control']) !!}
@endif
						</div>

					</fieldset>

				</div>

			{!! Form::close() !!}

		</div>

	</section>

@endif
@stop

