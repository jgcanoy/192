<html>
<head>
	
	<title><?=$title?></title>
</head>
<body>
	<h1>ExQuest</h1>
	<h2>Step 1.</h2>
	<?=form_open("reg/step1");?>
	<h3>Personal Info</h3>
	Last Name: <input type="text" name="lname" value="<?php echo set_value('lname');?>"/> <?php echo form_error('lname');?> <br />
	First Name: <input type="text" name="fname" value="<?php echo set_value('fname');?>"/> <?php echo form_error('fname');?> <br />
	Contact No.: <input type="text" name="contact" value="<?php echo set_value('contact')?>"/><br />
	<h3>User Account</h3>
	Password: <input type="password" name="pass" />	<?php echo form_error('pass');?><br />
	Confirm Password: <input type="password" name="pass2" /><?php echo form_error('pass2');?><br />
	User type: Please check one below. If you wish to be a regular administrator, please leave it blank.<br/>
	<ul style="list-style: none;">
		
		<li><?=form_checkbox('team','1',FALSE);?>Team Leader</li>
		<li><?=form_checkbox('appoff','1',FALSE);?> Approving Officer</li>
		
	</ul>
		
	<input type="submit" value="Next" />
	</form>
</body>
</html>