<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>رابط استعادة كلمة المرور</h2>
<div>
	<br>
	<a href="{{ URL::route('company-reset-password', ['active' => $token]) }}">
		{{ URL::route('company-reset-password', ['active' => $token]) }}
	</a>
</div>

</body>
</html>