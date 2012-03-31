<div id="reqPan">
		<br />
		<?=form_open('/main/request/')?>
			<input class="botton" type="submit" value="Create Request" name="create" />
		</form>
		<br />
		<br />
		<br />
		
		<h2>Pending Requests</h2>
		
		<?=$t1?>
		 
		<br />
		<h2 ><font color="#99CCFF">Your Approved Requests</font></h2>
		
		<?=$t2?>
		
		<br />
		<h2 ><font color="#FF9999">Your Disapproved Requests</font></h2>
		
		<?=$t3?>
		
		<br />
		<br />
		<br />
	</div>