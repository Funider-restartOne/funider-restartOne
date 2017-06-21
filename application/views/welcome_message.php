<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
<?= $map['js']; ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkD511n17yo1FAPojJ-8lK2-S3YYXIIs&callback=initMap"
  type="text/javascript"></script>
</head>
<body>
<?= $map['html']; ?>
</body>
</html>