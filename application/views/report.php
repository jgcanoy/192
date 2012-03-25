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
			<a href="index.html"><img src="images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
			<h1></h1>
			<ul>
				<li ><a href="main.php" >Home</a> </li>
				<li ><a href="account.php">Account</a>
				</li>
				<li><?=anchor('/main/report', 'View Reports')?></li>
				<li class="contact"><?=anchor('/user/logout', 'Sign Out')?></li>
	
			</ul>
		</div>
	</div>
	
	<div id="reqPan">
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
	
	<?php
		if(isset($_POST['ok'])) {
			echo "<h2 ><font color=\"#FF9999\">Transaction Report</font></h2>
		
		<table id=\"alternatecolor\" cellpadding=\"2\" class=\"altrowstable\" > 
			<thead> 
			<tr> 
				<th>Ref. No.</th>
				<th>Date</th>
				<th>Name</th>
				<th>Type</th>
				<th>Particulars</th> 
				<th>Quantity</th> 
				<th>Amount</th>
			</tr> 
			</thead> 
			<tbody> 
			<tr> 
				<td>201200021</td> 
				<td>2012-02-20</td>
				<td>Mary Grace Rubio</td>
				<td>Reimbursement</td>
				<td>iPad 2</td> 
				<td>1</td> 
				<td>30000</td>
			</tr> 
			<tr> 
				<td>201200044</td> 
				<td>2012-02-21</td>
				<td>Hannah Sun</td>
				<td>Reimbursement</td>
				<td>Honda CR-V</td> 
				<td>1</td> 
				<td>2000000</td>
			</tr> 
			<tr> 
				<td>201200052</td> 
				<td>2012-02-21</td>
				<td>Arianne Libunao</td>
				<td>Cash Advance</td>
				<td>iPhone 4s</td> 
				<td>2</td> 
				<td>80000</td>
			</tr> 
			<tr> 
				<td>201200053</td> 
				<td>2012-02-22</td>
				<td>Emery Dela Cruz</td>
				<td>Reimbursement</td>
				<td>iPad 2</td> 
				<td>1</td>  
				<td>30000</td>
			</tr> 
			</tbody> 
		</table>";
		}
	?>
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