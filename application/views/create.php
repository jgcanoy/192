<div id="reqPan">
		<h2 ><font color="#99CCFF">Create Request</font></h2>
		<?php echo form_open('main/submit'); ?>
			<p>
            <p>Name: <?php echo $name; ?> <br/></p>
			<p>Date: <?php echo date("m/d/Y"); ?><br/></p>
			<p>Ref. No: <?php echo $refnum;?></p>
          </p>
		  <p>Request for: <?php echo form_dropdown('type',$types,'Cash Advance'); ?></p>
			<table cellpadding="2" class="altrowstable" id="alternatecolor"> 
				<tr>
					<th>Particulars</th>
					<th>Quantity</th>
					<th>Unit Price</th>
				</tr>
				<tbody>
				<tr>
					<td><input type="text" name="particulars[]"/></td>
					<td><input type="text" name="quantity[]"></td>
					<td><input type="text" name="price[]"></td>

				</tr>
				</tbody>
			</table>
			
			<input type="button" class="botton" style="margin-top: 5px;" onClick="javascript:insRow()" value="Add Item" /><br /><br />
			
			<p>Team Leader: <?php echo form_dropdown('leader',$leaders,'')?> <br/></p>	
			
			<p>Approving Officers: <?php echo form_dropdown('appoff',$appoffs,'')?></p>
			<br />
			<input type = "hidden" name="id" value = <?php echo $id ?> />
			<input type = "hidden" name="cid" value = <?php echo $cid ?> />
			<input type="hidden" name="refnum" value=<?php echo $refnum?> />
			<input type="submit" class="float-right botton" style="margin-top: 5px;" value="Submit Request" />
		</form>
	</div>
	