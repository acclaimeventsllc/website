You received a message from AcclaimEvents.com

<p><strong style="font-size: x-large;">{{ $name }}</strong>, <em style="font-size: small;">{{ $title }}</em>, <span style="font-size: small;">{{ $company }}</span><br><span>has registered as <strong>{{ $attendance }}</strong> for the {{ $conference }} conference!</span></p>
<p>@if (!empty($email))
	<strong>Email:</strong> {{ $email }}<br> @endif @if (!empty($phone))
	<strong>Phone:</strong> {{ $phone }}<br> @endif @if (!empty($address))
	<strong>Address:</strong> {{ $address }}<br>@endif
</p>

@if (!empty($affiliation))
<p>{{ $name }} has indicated they are a member of <strong>{{ $affiliation }}</strong>.</p>
@endif

@if (isset($referrals) && is_array($referrals))
<p>In addition, {{ $name }} has recommended we contact:</p>
@foreach ($referrals as $person)
<p>
	<strong>Name:</strong> {{ $person->name }}<br>
	<strong>Title:</strong> {{ $person->title }}<br>
	<strong>Email:</strong> {{ $person->email }}<br>
	<strong>Phone:</strong> {{ $person->phone }}<br>
</p>
@endforeach
@endif

@if (isset($refs) && is_array($refs))
<p>In addition, {{ $name }} has recommended we contact:</p>
<p>
	<strong>Name:</strong> {{ $refs['name'] }}<br>
	<strong>Title:</strong> {{ $refs['title'] }}<br>
	<strong>Email:</strong> {{ $refs['email'] }}<br>
	<strong>Phone:</strong> {{ $refs['phone'] }}<br>
</p>


@endif
