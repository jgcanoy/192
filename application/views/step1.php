<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=$css?>" />
	<title><?=$title?></title>
</head>
<body>
	<h1>ExQuest</h1>
	<h2>Step 1.</h2>
	<?=form_open("register/step/2");?>
	<h3>Personal Info</h3>
	Last Name: <input type="text" name="lname" /><br />
	First Name: <input type="text" name="fname" /><br />
	Middle Name: <input type="text" name="mname" /><br />
	Contact No.: <input type="text" name="contact" /><br />
	<h3>User Account</h3>
	Password: <input type="password" name="pass" /><br />
	Confirm Password: <input type="password" name="pass2" /><br /><br />
	<input type="submit" value="Next" />
	</form>
</body>
</html>