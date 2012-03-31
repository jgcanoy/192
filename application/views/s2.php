<div id="reqPan">
	<!--<h1>ExQuest</h1>
	<hr />
	<h4>Step 1 -> <strong>Step 2</strong></h4>
	<hr />	-->
	<h2>Step 1 -> <strong>Step 2</strong></h2>
	<fieldset>
	<?=form_open("reg/step2");?>
	<h3>Company Info</h3>
	<label for="cname">Company Name: </label><input type="text" name="cname" value="<?php echo set_value('cname');?>"/> <?php echo form_error('cname');?>  <br />
	<label for="caddr">Company Address: </label><input type = "text" name="caddr" value="<?php echo set_value('caddr')?>"/><br />
	<label for="cemail">Company Email: </label><input type="text" name="cemail" value = "<?php echo set_value('cemail')?>"/> <?php echo form_error('cemail');?><br />
	<label for="ccontact">Contact No.: </label><input type = "text" name="ccontact" value = "<?php echo set_value('ccontact')?>"><br /><br />
	</fieldset>
	<?=form_submit('', 'Next', 'class="botton"')?>
	</form>
</div>