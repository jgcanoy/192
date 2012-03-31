<div id="reqPan">
	<br /><br />
	<b>Reference Number: </b>&nbsp;&nbsp;&nbsp;<?=$refnum?> <br /><br/>
	<b>Name: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$uname?> <br />
	<b>Date Created: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?> <br />
	<b>Type: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$type?> <br />
	<b>Status: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$status?> <br />
	<br/>
	<?=$ptable?>
	<br/>
	<b>Team Leader:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $t['lname'].", ".$t['fname']; ?><br />
	<b>Approving Officer:</b>&nbsp;<?php echo $a['lname'].", ".$a['fname']; ?><br />
	<b>Total Amount: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$total?> <br /><br />
	
	<?php
	$user = $this->session->userdata('id');
	if(($t['id'] == $user['id'] && $row['teamapprove'] == 2)) { 
		echo form_open("/user/checkApproval/".$refnum);
		echo form_submit('t_approve', 'Approve');
		echo form_submit('t_disapprove', 'Disapprove');
		echo form_submit('home', 'Back to Home');
		echo "</form>";
	} else if(($a['id'] == $user['id'] && $row['appoffapprove'] == 2 && $row['teamapprove'] == 1)) { 
		echo form_open("/user/checkApproval".$refnum);
		echo form_submit('a_approve', 'Approve');
		echo form_submit('a_disapprove', 'Disapprove');
		echo form_submit('home', 'Back to Home');
		echo "</form>";
	} else {
		echo form_open("/user/checkApproval/".$refnum);
		echo form_submit('home', 'Back to Home', 'class="botton"');
		echo "</form>";
	}
	?><br /><br />
</div>