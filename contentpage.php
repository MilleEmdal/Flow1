<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Profil</title>
</head>

<body>
<?php
	if(empty($_SESSION['uid'])){
		echo 'Need to log in to see the secrets....';
	}
	else {
		echo '<h2>Welcome '.$_SESSION['userName'] . '</h2>' . '<li><a href="index.php">Log out</a></li>' . '<br>';
	}
?>
	
	<div class="container">
		
	<p>
		Lorem ipsum dolor sit amet, justo accumsan in habitant ullamcorper sapien quis, vitae quis. 
		Ultricies cras sit erat sollicitudin scelerisque, nulla viverra massa quisque, 
		mi nisl enim enim tellus porttitor, a nisl id vitae id vel porta, iaculis tristique nulla 
		maecenas ut. Fusce nam et. Eleifend sagittis diam, mi pede, lacus nunc fringilla elit elit, 
		dignissim amet a condimentum sed, wisi libero nec mi sapien. Rutrum fringilla condimentum quis 
		morbi, sagittis purus habitasse imperdiet amet nulla adipiscing, metus at eros arcu adipiscing 
		sed nullam, et est eros maecenas tincidunt, sapien curabitur mi sapien.
	</p>
	
	<br>
	 <img src="ice.JPG" class="image">
		 
	</div>
	
	
</body>
</html>