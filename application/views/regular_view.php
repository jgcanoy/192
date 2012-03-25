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
</head>

<body>
<?=anchor('/user/logout', 'Logout')?>
<div id="header_container">
<div id="header">
  <a href="index.html"><img src="/192/images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
 <h1></h1>
  <ul>
    <li class="on"><a href="main.php" >Home</a> </li>
     <li ><a href="account.php">Account</a>
	 </li>
     <li class="contact"><a href="/192/index.php/user/logout">Sign Out</a></li>
  </ul>
  </div>
</div>

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

