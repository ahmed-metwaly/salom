<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>رابط استعادة كلمة المرور</h2>
<div>
	<br>
	<a href="<?php echo e(route('reset-password', ['active' => $token])); ?>">
		<?php echo e(route('reset-password', ['active' => $token])); ?>

	</a>
</div>

</body>
</html>
