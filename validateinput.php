<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php

if(filter_input(INPUT_GET, 'submit')){

	$n = filter_input(INPUT_GET, 'name') 
		or die('Missing/illegal name parameter');

	$e = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL)
		or die('Missing/illegal email parameter');

	$a = filter_input(INPUT_GET, 'age', 
					  FILTER_VALIDATE_INT,
					  array("options" => array("min_range"=>0, 
											   "max_range"=>120))
					  )
		or die('Missing/illegal age parameter');
	
	echo 'Parameters checked out ok :-)<br>';
	echo 'name:'.$n.'<br>';
	echo 'email:'.$e.'<br>';
	echo 'age:'.$a.'<br>';
}
	
?>

<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
	<fieldset>
    	<legend>Input stuff here</legend>
    	<input name="name"   type="text"   placeholder="Navn"   required />
    	<input name="email"  type="email"  placeholder="E-mail" required />
    	<input name="age"    type="number" placeholder="Alder"  required min="0" max="120" />
    	<input name="submit" type="submit" value="Check my stuff" />
	</fieldset>
</form>
</p>

</body>
</html>