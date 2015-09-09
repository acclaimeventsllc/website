You received a message from AcclaimEvents.com

<h2>Registration for the {{ $conference }} conference</h2>

<p>
	<strong>Name:</strong> {{ $name }}<br>
	<strong>Title:</strong> {{ $title }}<br>
	<strong>Company:</strong> {{ $company }}<br>@if (!empty($affiliation))
	<strong>Affiliation:</strong> {{ $affiliation }}<br>@endif
</p>

<p>
	<strong>Registered as:</strong> {{ $attendance }}
</p>

<p>
	<strong>Email:</strong> {{ $email }}<br>
	<strong>Phone:</strong> {{ $phone }}<br>
	<strong>Address:</strong> {{ $address }}<br>
</p>

@if(isset($referrals) && is_object($referrals) && !empty($referrals->name) && !empty($referrals->email))
<p>{{ $name }} has referred this contact:</p>
<p>
	<strong>Name:</strong> {{ $referrals->name }}<br>
	<strong>Title:</strong> {{ $referrals->title }}<br>
	<strong>Email:</strong> {{ $referrals->email }}<br>
	<strong>Phone:</strong> {{ $referrals->phone }}<br>
</p>

@endif
