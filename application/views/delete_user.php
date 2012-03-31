<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="/192/images/icon.png">
	<title>ExQuest | Home</title>
<link href="/192/css/theme.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
    function toggle(id) {
        var state = document.getElementById(id).style.display;
            if (state == 'block') {
                document.getElementById(id).style.display = 'none';
            } else {
                document.getElementById(id).style.display = 'block';
            }
        }
</script>
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
	altRows('alternatecolor1');
	altRows('alternatecolor2');
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

		   // grab the input from the first cell and update its ID and value
		var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
		inp1.id += len;
		inp1.value = '';

		   // grab the input from the first cell and update its ID and value
		var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
		inp2.id += len;
		inp2.value = '';

		   // append the new row to the table
		x.appendChild( new_row );
		altRows('alternatecolor');
	}
	
	</script>
</head>

<body>
<div id="header_container">
<div id="header">
  <a href="/192/index.php/user"><img src="/192/images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
 <h1></h1>
  <ul>
    <li class="on"><?=anchor('/main/', 'Home')?></li>
     <li ><?=anchor('/accounts/', 'Account')?>
	 <ul>
		<li><?=anchor('/accounts/', 'User')?>
		<li class=\"contact\"><?=anchor('/company/', 'Company')?></li>
	</ul>
	 </li>
	 <li><?=anchor('/main/edit', 'Users')?>
	 	<ul class="addu">
	 		 <li><?=anchor ('/reg/addUser','Add User') ?></li>
			 <li><?=anchor('/main/edit', 'Edit User')?></li>
	 	</ul>
	 </li>
	<li><?=anchor('/main/report', 'View Reports')?></li>
     <li class="contact"><?=anchor('/user/logout', 'Sign Out')?></li>
  </ul>
  </div>
</div>

<div id="reqPan">
		<br />
		<?=form_open('/user/cdelete/'.$id)?>
		<h2>Confirm Delete</h2><br />
		Delete <strong><?php echo $fname." ".$lname;?></strong> from the database? <br /> 
		<?=form_submit('delete', 'Confirm Delete', 'class="botton"')?>
		<?=form_submit('back', 'Back', 'class="botton"')?> <br /><br /><br /><br /><br /><br />
		</form>
	</div>

<!--FOOTER-->
<div id="footermainPan">
  <div id="footerPan">
  	<div id="footerlogoPan"><a href="index.html"><img src="/192/images/footerlogo.gif" title="ExQuest" alt="ExQuest" width="180" height="36" border="0" /></a></div>
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

