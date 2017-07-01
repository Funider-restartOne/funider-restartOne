<!DOCTYPE html>
<html>
<head>
	<title>new password</title>
	<?php $this->load->view('general.php'); ?>
</head>
<body>
<form method="post" action="/index.php/Activity/set_new_password">
	<h1>put your new password</h1>
	<p>your new password</p>
	<input type="password" name="password" placeholder="password">
	<?php if (isset($error1)): ?>
		<p><?php echo $error1 ?></p>
	<?php endif ?>
	<p>confirm your password</p>
	<input type="password" name="conf_password" placeholder="confirm password">
	<?php if (isset($error)): ?>
		<?php echo $error ?>
	<?php endif ?>
	<input type="hidden" name="email" value="<?= $this->session->userdata('r_email') ?>">

	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>