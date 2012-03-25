<html>
<head>
	
	
</head>
<body>
	<h1>ExQuest</h1>
	<hr />
	<h4>Step 1 -> <strong>Step 2</strong></h4>
	<hr />	
	<?=form_open("reg/step2");?>
	<h3>Company Info</h3>
	Company Name: <input type="text" name="cname" value="<?php echo set_value('cname');?>"/> <?php echo form_error('cname');?>  <br />
	Company Address: <input type = "text" name="caddr" value="<?php echo set_value('caddr')?>"/><br />
	Company E-mail: <input type="text" name="cemail" value = "<?php echo set_value('cemail')?>"/> <?php echo form_error('cemail');?><br />
	Contact No.: <input type = "text" name="ccontact" value = "<?php echo set_value('ccontact')?>"><br /><br />
	<?=form_submit('', 'Next')?>
	</form>
	<hr />
</body>
</html>
