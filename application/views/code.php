<!DOCTYPE html>
<html>
<head>
	<title>code</title>
	<?php $this->load->view('general.php'); ?>
</head>
<body>
<form action="/index.php/Activity/check_code" method="post">
<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
	<h1>we sent you the code on your e-mail address please check your email and type the code here</h1>
	<input type="code" name="code">
	<input type="hidden" name="email" value="<?= $this->session->userdata('r_email') ?>">
	<?php if (isset($error)){ echo $error; } ?>
	<input type="submit" name="submit">
</form>
</body>
</html>