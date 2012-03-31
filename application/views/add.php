	
	<?=form_open("reg/addUser");?>
	<h2>Add Users</h2><br />
	Last Name: <input type="text" name="lname" value="<?php echo set_value('lname');?>"/> <?php echo form_error('lname');?> <br />
	First Name: <input type="text" name="fname" value="<?php echo set_value('fname');?>"/> <?php echo form_error('fname');?> <br /><br />
	User Type: <br />
	<ul style="list-style: none;">
		<li><?=form_checkbox('admin','1',FALSE);?> Administrator</li>
		<li><?=form_checkbox('team','1',FALSE);?> Team Leader</li>
		<li><?=form_checkbox('appoff','1',FALSE);?> Approving Officer</li>
		<li><?=form_checkbox('regular','1',FALSE);?> Regular User</li>
	</ul>
	<br /><br />	 
	<h3>User Account</h3><br />
	Email:  <input type="text" name="email" value = "<?php echo set_value('email')?>"/> <?php echo form_error('email');?><br />
	Password: <input type="password" name="pass" />	<?php echo form_error('pass');?><br />
	Confirm Password: <input type="password" name="pass2" /><?php echo form_error('pass2');?><br /><br />
	<?=form_submit('submit', 'Add More Users', 'class="botton"')?>
	
	<?=form_submit('submit', 'Done', 'class="botton"')?>
	</form><br /><br />