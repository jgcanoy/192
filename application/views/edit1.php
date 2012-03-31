<?php echo form_open('accounts/usersettings'); ?>
<h2>User Account</h2>
	Last Name: <input type="text" name="lname" value="<?php echo set_value('lname', $lname);?>"/> <?php echo form_error('last');?> <br />

	First Name: <input type="text" name="fname" value="<?php echo set_value('fname', $fname);?>"/> <?php echo form_error('fname');?> <br />

	New Password: <input type="password" name="password" /> <?php echo form_error('password');?><br />
	Confirm Password: <input type="password" name="cpassword" /><?php echo form_error('cpassword');?><br /><br />
	
	Enter current password to save changes: <br /><input type="password" name="oldpassword" />	<?php echo form_error('oldpassword');?><br /><br />
	
	<?=form_submit('', 'Save Changes', 'class="botton"')?> <br /><br />
</form>