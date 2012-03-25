<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="/192/images/icon.png">
	<title>ExQuest | Reports</title>
	<link href="/192/css/theme.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/192/js/jquery-ui-1.7.1/themes/base/ui.all.css">
	<script type="text/javascript" src="/192/js/jquery-1.4.1.js"></script>
	<script src="/192/js/jquery-ui-1.7.1/ui/ui.core.js"></script>
	<script src="/192/js/jquery.ui.widget.js"></script>
	<script src="/192/js/jquery-ui-1.7.1/ui/ui.datepicker.js"></script>
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
	<script>
	$(function() {
		var dates = $( "#from, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
</head>

<body>
	
	<div id="header_container">
		<div id="header">
			<a href="index.html"><img src="/192/images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
			<h1></h1>
			<ul>
				<li ><a href="main.php" >Home</a> </li>
				<li ><a href="account.php">Account</a></li>
				 <li><a href=\"adduser.php\" >Add User</a></li>
				<li><?=anchor('/main/report', 'View Reports')?></li>
				
				
				
				<li class="contact"><?=anchor('/user/logout', 'Sign Out')?></li>
			</ul>
		</div>
	</div>
	
	<div id="reqPan">
		
	
	
		
			<h2 ><font color=\"#FF9999\">Transaction Report</font></h2>
		
		<table id=\"alternatecolor\" cellpadding=\"2\" class=\"altrowstable\" border="1" > 
		<caption><b><?php echo $type.' Requests '.'from '.$from.' '.'to '.$to;?></b></caption>	
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
				<?php if($type == 'All') echo "<th>Status</th>"; ?>
			</tr> 
			</thead> 
			<tbody> 
			<?php
				if($query->num_rows() == 0){
					echo '<center><h4>No available data.<center></h4>';
				}else{	$sum = 0;
					foreach ($query->result_array() as $row):
					
					$total = $row['price']*$row['quantity'];
					$sum = $sum+$total;
					//echo $row['refnum'].' '.$row['particulars'].' '.$row['quantity'].' '.$row['price'].' '.$total.'<br/>';	
		
					//echo $sum;
			?>	
	<tr align = "center">
		<td><?php echo $row['refnum']; ?></td>
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
	</tr>
<?php 
	};
?>
	
			</tbody> 
		</table>
		
	
	</div>
	<br />
	<br />
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