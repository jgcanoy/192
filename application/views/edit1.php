<html>
<head>
<title>Account Settings</title>
</head>
<body>

<?php echo form_open('accounts/usersettings'); ?>
<h3>User Account</h3>
	Last Name: <input type="text" name="lname" value="<?php echo set_value('lname', $lname);?>"/> <?php echo form_error('last');?> <br />

	First Name: <input type="text" name="fname" value="<?php echo set_value('fname', $fname);?>"/> <?php echo form_error('fname');?> <br />

	Current Password: <input type="password" name="oldpassword" />	<?php echo form_error('oldpassword');?><br />
	New Password: <input type="password" name="password" /> <?php echo form_error('password');?><br />
	Confirm Password: <input type="password" name="cpassword" /><?php echo form_error('cpassword');?><br />	
	<?=form_submit('', 'Save Changes')?> <br /><br /> <?=anchor('/main/','Back to Home')?>
</form>

</body>
</html>
