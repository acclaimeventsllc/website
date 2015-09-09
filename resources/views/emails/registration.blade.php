You received a message from AcclaimEvents.com

<p>
	<strong style="font-size: x-large;">{{ $name }}</strong>,
	<em style="font-size: small;">{{ $title }}</em>,
	<span style="font-size: small;">{{ $company }}</span><br>
	<span>has registered as <strong>{{ $attendance }}</strong> for the {{ $conference }} conference!</span>
</p>
<p>
	<strong>Email:</strong> {{ $email }}<br>
	<strong>Phone:</strong> {{ $phone }}<br>
	<strong>Address:</strong> {{ $address }}<br>
</p>

@if (!empty($affiliation))
<p>{{ $name }} has indicated that they are a member of {{ $affiliation }}.</p>

@endif

@if(isset($referrals) && is_object($referrals) && !empty($referrals->name) && !empty($referrals->email))
<p>{{ $name }} has suggested that we contact:</p>
<p>
	<strong>Name:</strong> {{ $referrals->name }}<br>
	<strong>Title:</strong> {{ $referrals->title }}<br>
	<strong>Email:</strong> {{ $referrals->email }}<br>
	<strong>Phone:</strong> {{ $referrals->phone }}<br>
</p>

@endif
