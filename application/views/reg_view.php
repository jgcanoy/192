<html>
<head>
<title>ExQuest | Register</title>
</head>
<body>
	<?=form_open('/reg/pass_enc')?>
	C1: <?=form_checkbox('c1', '0')?><br />
	C2: <?=form_checkbox('c2', '1')?><br /><br />
	<?=form_submit('', 'Submit')?>
	</form>
</body>
</html>