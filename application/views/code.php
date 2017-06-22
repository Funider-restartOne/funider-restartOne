<!DOCTYPE html>
<html>
<head>
	<title>code</title>
</head>
<body>
<form action="/index.php/Activity/check_code" method="post">
	<h1>we sent you the code on your e-mail address please check your email and type the code here</h1>
	<input type="code" name="code">
	<input type="hidden" name="email" value="<?= $this->session->userdata('r_email') ?>">
	<?php if (isset($error)){ echo $error; } ?>
	<input type="submit" name="submit">
</form>
</body>
</html>