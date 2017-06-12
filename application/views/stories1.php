<?php /* do not touch the back end and the name and value of the form */ ?>
<!DOCTYPE html>
<html>
<head>
	<title>stories</title>
</head>
<body>
<?php if ($this->session->userdata('user_id')) {?>
<form action="/index.php/Activity/insert_post" method="post">
	<label>Title :</label><br>
	<input type="text" name="title"><br>
	<label>Post :</label><br>
	<textarea name="message"></textarea><br>
	<input type="submit" name="submit" value="Post">
</form>
<?php
}
 for ($i=0; $i <count($post) ; $i++) 
{ 
	echo $post[$i]['first_name']." ".$post[$i]['last_name']."<br>".$post[$i]['title']."<br>";
	echo $post[$i]['message']."<br>".$post[$i]['created_at']."<br>";
	$comments=$post[$i]['comments'];
	if($post[$i]['id'] === $this->session->userdata('user_id')){
?>
	<form action="/index.php/Activity/update_post" method="post">
		<input type="text" name="title" placeholder="new title"><br>
		<textarea name="message" placeholder="new message"></textarea><br>
		<input type="submit" name="update_p" value="Edit">
		<input type="hidden" name="messages" value="<?=$post[$i]['messages_id'];?>">
	</form>
	<form action="/index.php/Activity/delete_post" method="post">
		<input type="submit" name="update_c" value="Delete">
		<input type="hidden" name="message" value="<?=$post[$i]['messages_id'];?>">
	</form>
<?php
}
	for ($j=0; $j <count($comments) ; $j++) 
	{ 
		?>
<div style="margin-left: 50px;">
<?php 
		echo $comments[$j]['first_name']." ".$comments[$j]['last_name']."<br>";
		echo $comments[$j]['comment']."<br>";
		echo $comments[$j]['created_at']."<br>";
		if( $comments[$j]['users_messages_id'] == $this->session->userdata('user_id')){
		?>
	<form action="/index.php/Activity/update_comment" method="post">
		<textarea name="comment"></textarea><br>
		<input type="submit" name="update_c" value="Edit">
		<input type="hidden" name="messages" value="<?=$comments[$j]['id_c'];?>">
	</form>
	<form action="/index.php/Activity/delete_comment" method="post">
		<input type="submit" name="update_c" value="Delete">
		<input type="hidden" name="message" value="<?=$comments[$j]['id_c'];?>">
	</form>
	<?php } ?>
</div>
<?php 
	}
	 if ($this->session->userdata('user_id')) {
	?>
<div style="margin-left: 50px;">
	<form action="/index.php/Activity/insert_comment" method="POST">
		<textarea name="comment"></textarea><br>
		<input type="submit" name="submit" value="comment">
		<input type="hidden" name="message" value="<?=$post[$i]['messages_id'];?>">
	</form>
</div>
<br>
<?php } 
}?>
</body>
</html>