<!DOCTYPE html>
<html>
<head>
	<title>put your email</title>
</head>
<body>
	<form action="/index.php/Activity/check_email" method="post">
		<h1>put your email</h1>
		<input type="email" name="email" placeholder="email">
		<?php if (isset($error)){ echo $error; } ?>
		<input type="submit" name="submit">
	</form>
</body>
</html>