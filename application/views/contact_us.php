<!DOCTYPE html>
<html>
<head>
	<title>contact us</title>
	<?php $this->load->view('general.php'); ?>
</head>
<body>

<form action="/index.php/Activity/contact_pro" method="post">
	name:<input type="text" name="name" placeholder="name">
	<?php echo form_error('name','<p style="color: red;">','</p>');?>
	email:<input type="email" name="email" placeholder="email">
	<?php echo form_error('email','<p style="color: red;">','</p>');?>
	subject:<input type="text" name="subject" placeholder="subject">
	<?php echo form_error('subject','<p style="color: red;">','</p>');?>
	message:<textarea name="message" placeholder="message"></textarea>
	<?php echo form_error('message','<p style="color: red;">','</p>');?>

<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
	<button>send</button>
	<?php if (isset($done)) {
		echo '<p style="color:red;">'.$done.'!!</p>';
	}?>
</form>
</body>
</html>