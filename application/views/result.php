		<h2 ><font color=\"#FF9999\">Transaction Report</font></h2>
		
		<table cellpadding="2" class="altrowstable" id="alternatecolor" > 
		<br />
		<p align="center"><b><?php echo $type.' Requests '.'from '.$from.' '.'to '.$to; $col = 0;?></b></p>	
		<br />	
			<thead> 
			<tr> 
				<th>Ref. No.</th>
				<th>Date</th>
				<th>Name</th>
				<!--<th>Type</th>-->
				<th>Particulars</th> 
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Amount</th>
				<?php if($type == 'All') {
					echo "<th>Status</th>";
					$col = 1; 
				}
				?>
			</tr> 
			</thead> 
			<tbody> 
			<?php
				if($query->num_rows() == 0){
					//echo '<center><h4>No available data.<center></h4>'; ?>
					<tr align = "center">
						<td colspan="<?php echo ($col+7); ?>"><i>No data to display</i></td>
					</tr>
				<?php }else{	$sum = 0;
					foreach ($query->result_array() as $row):
					
					$total = $row['price']*$row['quantity'];
					$sum = $sum+$total;
					//echo $row['refnum'].' '.$row['particulars'].' '.$row['quantity'].' '.$row['price'].' '.$total.'<br/>';	
		
					//echo $sum;
			?>	
	<tr align = "center">
		<td><?php echo anchor('user/view/'.$row['refnum'],$row['refnum']) ?></td>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['fname'].' '.$row['lname']; ?></td>
		<td><?php echo $row['particulars']; ?></td>
		<td><?php echo $row['quantity']; ?></td>
		<td align=""><?php echo $row['price']; ?></td>
		<td><?php echo $total; ?></td>
		<?php if($type == 'All') echo "<td>".$row['status']."</td>"; ?>
	</tr>
<?php
	endforeach;

?> 
	<tr align = "center">
		<th colspan="6">Total Amount</th>
		<td><b><?php echo 'P '.$sum.'.00'?></b></td>
		<?php if($type == 'All') echo "<td></td>"; ?>
	</tr>
<?php 
	};
?>
			</tbody> 
		</table>
	<?=form_open('/user/')?>
	<?=form_submit('', 'Back to Home', 'class="botton"')?>
	</form>
	<?=form_open('/main/report')?>
	<?=form_submit('', 'Back to Reports', 'class="botton"')?>
	</form>
	<br />
	<br />
	