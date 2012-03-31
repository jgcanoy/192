<div id="reqPan">
	<!--<h1>ExQuest</h1>
	<hr />
	<h4>Step 1 -> Step 2 -> <strong>Step 3</strong></h4>
	<hr />	-->
	<h2>Step 1 -> Step 2 -> <strong>Step 3</strong></h2>
	<fieldset>
	<?=form_open("reg/step3");?>
	<h3>Add Users</h3>
	<label for="lname">Last Name: </label><input type="text" name="lname" value="<?php echo set_value('lname');?>"/> <?php echo form_error('lname');?> <br />
	<label for="fname">First Name: </label><input type="text" name="fname" value="<?php echo set_value('fname');?>"/> <?php echo form_error('fname');?> <br />
	<label for="contact">Contact No.: </label><input type="text" name="contact" value="<?php echo set_value('contact')?>"/><br />
	<label for="utype">User Type: </label><br />
	<ul style="list-style: none;">
		<li><?=form_checkbox('admin','1',FALSE);?> Administrator</li>
		<li><?=form_checkbox('team','1',FALSE);?> Team Leader</li>
		<li><?=form_checkbox('appoff','1',FALSE);?> Approving Officer</li>
		<li><?=form_checkbox('regular','1',FALSE);?> Regular User</li>
	</ul>
	</fieldset>
	<hr />	 
	<fieldset>
	<h3>User Account</h3><p>
	<label for="email">Email: </label><input type="text" name="email" value = "<?php echo set_value('email')?>"/> <?php echo form_error('email');?><br />
	<label for="password">Password: </label><input type="password" name="pass" />	<?php echo form_error('pass');?><br />
	<label for="cpassword">Confirm Password: </label><input type="password" name="pass2" /><?php echo form_error('pass2');?><br />
	</p></fieldset>
	<?=form_submit('submit', 'Add More Users', 'class="botton"')?>
	<?=form_submit('submit', 'Skip', 'class="botton"')?>
	<?=form_submit('submit', 'Next', 'class="botton"')?>
	</form>
</div>