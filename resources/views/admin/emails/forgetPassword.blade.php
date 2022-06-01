<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>رابط استعادة كلمة المرور</h2>
<div>
	<br>
	<a href="{{ route('reset-password', ['active' => $token]) }}">
		{{ route('reset-password', ['active' => $token]) }}
	</a>
</div>

</body>
</html>
