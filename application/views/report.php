		<h2 ><font color="#99CCFF">Report Generator</font></h2>
		<?=form_open('/main/generate')?>
			<h3 >Report Type</h3>
			<p><label for="summary">Summary of: </label>
			<?php echo form_dropdown('type',$types,''); ?>
			<br />
			<h3 style="margin-bottom: 5px;">Transaction Date</h3>
			</fieldset>		
			<label for="from" style="margin-left: 150px;">From</label>
			<input type="text" id="from" name="from"/>
			<label for="to">to</label>
			<input type="text" id="to" name="to"/>
			<br />
			<input class="botton" type="submit" value="Create Report" name="ok"/>
		</form><br /><br />
	<br />
	<br />
