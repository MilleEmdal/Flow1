<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
Here be content :-9

<hr>
<?php
	if(empty($_SESSION['uid'])){
		echo 'Need to log in to see the secrets....';
	}
	else {
		echo 'Welcome '.$_SESSION['username'].'<br>The answer is 42';
	}
?>
</body>
</html>