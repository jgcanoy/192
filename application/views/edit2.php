<?php echo form_open('company/companysettings'); ?>
	<h2>Company Info</h2>
	Company Name: <input type="text" name="cname" value="<?php echo set_value('cname', $cname);?>"/> <?php echo form_error('cname');?>  <br />
	Company Address: <input type = "text" name="caddr" value="<?php echo set_value('caddr', $caddr);?>"/><br />
	Company E-mail: <input type="text" name="cemail" value = "<?php echo set_value('cemail', $cemail);?>"/> <?php echo form_error('cemail');?><br />
	Contact No.: <input type = "text" name="cnum" value = "<?php echo set_value('cnum', $cnum);?>"><br /><br />
	<?=form_submit('', 'Save Changes', 'class="botton"')?> <br /><br />
	</form>