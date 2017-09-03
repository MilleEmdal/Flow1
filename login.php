<?php session_start();
if(isset($_SESSION['usr_id'])!=""){
	header("Location: contentpage.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Log IN</title>
</head>

<body>

<?php
if(filter_input(INPUT_POST, 'submit')){

	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');

	require_once('dbcon.php');
	$sql = 'SELECT user_id, password FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) { }
	
	if (password_verify($pw, $pwhash)){
		echo 'Logged in as '.$un .  ' <a href="contentpage.php">Go to your page</a>';
		$_SESSION['uid'] = $uid;
		$_SESSION['userName'] = $un;
		
		
	}
	else{
		echo 'Forkert Bruger navn eller password';
	}

	echo '<hr>';
}
	
?>


<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Login</legend>
    	<input name="un" type="text"     placeholder="Brugernavn" required />
		<br>
    	<input name="pw" type="password" placeholder="Password"   required />
		<br>
    	<input name="submit" type="submit" value="Login" />
	</fieldset>
</form>
</p>
</body>
</html>