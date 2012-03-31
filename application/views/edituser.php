<!-- This is the Edit USer page 
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="icon.png">
	<title>ExQuest | Home</title>
<link href="theme.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript">
function show_confirm()

{
	var r=confirm("Are you sure you want to approve the request?");
if (r==true)
  {
  alert("You pressed OK!");
  }
else
  {
  alert("You pressed Cancel!");
  }
}
</script>
<script type="text/javascript">
function show_confirm2()
{
	var r=confirm("Are you sure you want to disapprove the request?");
if (r==true)
  {
  alert("You pressed OK!");
  }
else
  {
  alert("You pressed Cancel!");
  }
}
</script>
</head>

<body>
<?php
		session_start();
		if(!isset($_SESSION['name'])) {
			session_destroy();
			header('Location: index.php');
		}
	?>
<div id="header_container">
<div id="header">
  <a href="index.html"><img src="images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
 <h1></h1>
  <ul>
    <li class="on"><a href="main.php" >Home</a> </li>
     <li ><a href="account.php">Account</a>
	 <?php
				if(strcmp($_SESSION['name'], "admin") == 0) {
					echo "<ul>\n
							<li><a href=\"account.php\">User</a></li>\n
							<li class=\"contact\"><a href=\"company.php\">Company</a></li>\n
						</ul>\n";
				}
			?>
	 </li>
	 <?php
				if(strcmp($_SESSION['name'], "admin") == 0) {
					echo "<li>\n
							<a href=\"adduser.php\" >Add User</a>\n
						</li>\n
					      <li>\n
						    <a href=\"edituser.php\" >Edit User</a>\n
						</li>\n
						<li><a href=\"report.php\" style=\"font-size: 11px;\">View Reports</a></li>\n";
				}
			?>
     <li class="contact"><a href="signout.php">Sign Out</a></li>
  </ul>
  </div>
</div>

<?php
		
		if(isset($_SESSION['report'])) {
			echo "<div id=\"header2\"><h2>".$_SESSION['report']."</h2><br /><h6 ><a href=\"main.php\">Hide</a></h6></div>";
			unset($_SESSION['report']);
		}
	?>
	<?php
	$database="C:\xampp\htdocs\revEXQ\revEXQ\exquest";
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

/*else if ((mysqli_select_db($con,"exquest"))&&(mysqli_set_charset($con, 'utf8'))){
$output= "database connection established";
echo $output;
}*/
@mysql_select_db($database) or die( "Unable to select database");
?>
		
<!--FOOTER-->
<div id="footermainPan">
  <div id="footerPan">
  	<div id="footerlogoPan"><a href="index.html"><img src="images/footerlogo.gif" title="ExQuest" alt="ExQuest" width="180" height="36" border="0" /></a></div>
	<ul>
  	<li><a href="main.php">Home</a>| </li>
  	<li><a href="faqs_logged.php">FAQs</a> | </li>
	<li><a href="contact_logged.php">Contact Us</a> </li>
	</ul>
	<p class="copyright">�exquest2012. All rights reserved.</p>
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





