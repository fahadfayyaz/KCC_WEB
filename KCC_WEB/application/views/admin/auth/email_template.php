<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		h1 { color: red; font-family: tahoma; }
	</style>
</head>
<body>
<h1>Forgot Password</h1>
<p>To Reset your password, complete this form:</p>
<a href="<?php echo site_url( 'password/reset/' . $token ); ?>">
	<?php echo site_url('password/reset/' . $token); ?>
</a><br>

Thank you,
</body>
</html>