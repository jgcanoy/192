<html>
<head>
	
	<title><?=$title?></title>
</head>
<body>
	<h1>ExQuest</h1>
	<hr />
	<h4>Step 1 -> Step 2 -> <strong>Step 3</strong></h4>
	<hr />	
	<?=form_open("reg/step3");?>
	<h3>Add Users</h3>
	Last Name: <input type="text" name="lname" value="<?php echo set_value('lname');?>"/> <?php echo form_error('lname');?> <br />
	First Name: <input type="text" name="fname" value="<?php echo set_value('fname');?>"/> <?php echo form_error('fname');?> <br />
	Contact No.: <input type="text" name="contact" value="<?php echo set_value('contact')?>"/><br />
	User Type: <br />
	<ul style="list-style: none;">
		<li><?=form_checkbox('admin','1',FALSE);?> Administrator</li>
		<li><?=form_checkbox('team','1',FALSE);?> Team Leader</li>
		<li><?=form_checkbox('appoff','1',FALSE);?> Approving Officer</li>
		<li><?=form_checkbox('regular','1',FALSE);?> Regular User</li>
	</ul>
	<hr />	 
	<h3>User Account</h3>
	Email:  <input type="text" name="email" value = "<?php echo set_value('email')?>"/> <?php echo form_error('email');?><br />
	Password: <input type="password" name="pass" />	<?php echo form_error('pass');?><br />
	Confirm Password: <input type="password" name="pass2" /><?php echo form_error('pass2');?><br />
	<?=form_submit('submit', 'Add More Users')?>
	<!-- <?=form_button('skip', 'Skip', 'onClick="parent.location=\'4\'"')?> -->
	<?=form_submit('submit', 'Next')?>
	</form>
	<hr />
</body>
</html>
