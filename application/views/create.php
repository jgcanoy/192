<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="/192/images/icon.png">
	<title>ExQuest | Create Request</title>
<link href="/192/css/theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>
<script language="JavaScript">
	function insRow()
{
		var x=document.getElementById('alternatecolor');
		   // deep clone the targeted row
		var new_row = x.rows[1].cloneNode(true);
		   // get the total number of rows
		var len = x.rows.length;
		   // set the innerHTML of the first row 
		//new_row.cells[0].innerHTML = len;

		new_row.cells[0].innerHTML = '<input type="text" name="particulars[]"/>';
		new_row.cells[1].innerHTML = '<input type="text" name="quantity[]"/>';
		new_row.cells[2].innerHTML = '<input type="text" name="price[]"/>';
		

		   // append the new row to the table
		x.appendChild( new_row );
	}
	
	</script>
</head>

<body>

<div id="header_container">
<div id="header">
  <a href="index.html"><img src="images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
 <h1></h1>
  <ul>
    <li ><a href="main.php" >Home</a> </li>
     <li ><a href="account.php">Account</a>
	
	 </li>
	 
     <li class="contact"><a href="signout.php">Sign Out</a></li>
  </ul>
  </div>
</div>


	
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
					<th><label for="particulars">Particulars</label></th>
					<th><label for="quantity">Quantity</label></th>
					<th><label for="price">Unit Price</label></th>
				</tr>
				<tbody>
				<tr>
					<td><input type="text" name="particulars[]"/></td>
					<td><input type="text" name="quantity[]"></td>
					<td><input type="text" name="price[]"></td>

				</tr>
				</tbody>
			</table>
			
			<input type="button" class="botton" style="margin-top: 5px;" onClick="javascript:insRow()" value="Add Row" /><br /><br />
			
			<p>Team Leader: <?php echo form_dropdown('leader',$leaders,'')?> <br/></p>	
			
			<p>Approving Officers: <?php echo form_dropdown('appoff',$appoffs,'')?></p>
			<br />
			<input type = "hidden" name="id" value = <?php echo $id ?> />
			<input type = "hidden" name="cid" value = <?php echo $cid ?> />
			<input type="hidden" name="refnum" value=<?php echo $refnum?> />
			<input type="submit" class="float-right botton" style="margin-top: 5px;" value="Submit Request" />
		</form>
	</div>
	
<!--FOOTER-->
<div id="footermainPan">
  <div id="footerPan">
  	<div id="footerlogoPan"><a href="index.html"><img src="images/footerlogo.gif" title="ExQuest" alt="ExQuest" width="180" height="36" border="0" /></a></div>
	<ul>
  	<li><a href="main.php">Home</a>| </li>
  	<li><a href="faqs_logged.php">FAQs</a> | </li>
	<li><a href="contact_logged.php">Contact Us</a> </li>
	</ul>
	<p class="copyright">©exquest2012. All rights reserved.</p>
	<ul class="templateworld">
  	<li>design by:</li>
	<li><a href="http://www.templateworld.com" target="_blank">Template World</a></li>
  </ul>
   <div id="footerPanhtml"><a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML</a></div>
   <div id="footerPancss"><a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">css</a></div>
 
  </div>
</div>
</body>
</html>