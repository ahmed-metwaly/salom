<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>رابط تفعيل الحساب</h2>
<div>
	برجاء اتباع الرابط لتفعيل حسابك
	<br>
	<a href="<?php echo e(URL::route('AdminActiveEmail', ['active' => $token])); ?>">
		<?php echo e(URL::route('AdminActiveEmail', ['active' => $token])); ?>

	</a>
	<br>
</div>

</body>
</html>
