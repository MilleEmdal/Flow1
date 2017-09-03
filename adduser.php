<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Opret bruger</title>
</head>

<body>
<?php

if(filter_input(INPUT_POST, 'submit')){

	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');

	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
//	echo 'Opretter bruger<br>'.$un.' : '.$pw;
	
	require_once('dbcon.php');
	$sql = 'INSERT INTO users (userName, password) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pw);
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo 'user '.$un.' created :-)';
	}
	else {
		echo 'could not create user - does he exist???';
	}
	
}
?>

<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Tilføj ny bruger</legend>
    	<input name="un" type="text"     placeholder="Brugernavn" required />
		<br>
    	<input name="pw" type="password" placeholder="Password"   required />
		<br>
    	<input name="submit" type="submit" value="Tilføj bruger" />
	</fieldset>
</form>
</p>
</body>
</html>