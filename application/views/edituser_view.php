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
<?=anchor('/user/logout', 'Logout')?>
<div id="header_container">
<div id="header">
  <a href="index.html"><img src="/192/images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
 <h1></h1>
  <ul>
    <li class="on"><a href="main.php" >Home</a> </li>
     <li ><?=anchor('/accounts/', 'Account')?>
	 <ul>
		<li><?=anchor('/accounts/', 'User')?>
		<li class=\"contact\"><?=anchor('/company/', 'Company')?></li>
	</ul>
	 </li>
	 <li><?=anchor('/user/edituser', 'Edit User')?></li>
	<li><?=anchor('/main/report', 'View Reports')?></li>
     <li class="contact"><?=anchor('/main/logout', 'Sign Out')?></li>
  </ul>
  </div>
</div>
	
	<!-- The mismong code for the showing the content of the database-->
	
	<?php

	echo "<br>";
	echo"<table border=\"1\">";
	
	echo "<td>"; echo "ID"; echo"</td>";
	echo "<td>"; echo "Email"; echo"</td>";
	echo "<td>"; echo "Last Name"; echo"</td>";
	echo "<td>"; echo "First Name"; echo"</td>";
	echo "<td>"; echo "User Type"; echo"</td>"; ?>
	<?php foreach($results as $row):?>
	<?php
	echo "<tr>";
	echo "<td>"; echo $row->id; echo"</td>";
	echo "<td>"; echo $row->email; echo"</td>";
	echo "<td>"; echo $row->lname; echo"</td>";
	echo "<td>"; echo $row->fname; echo"</td>";
	
	if($row->isAdmin=="1"){
	echo "<td>"; echo "Admin"; echo"</td>";}
	if($row->isLeader=="1"&&!($row->isAdmin=="1")){
	echo "<td>"; echo "Leader"; echo"</td>";}
	if($row->isOfficer=="1"&&!($row->isAdmin=="1")){
	echo "<td>"; echo "Approving Officer"; echo"</td>";}
	if($row->isRegular=="1"&&!($row->isAdmin=="1")){
	echo "<td>"; echo "Regular"; echo"</td>";}
	
	echo "<td>";echo "Edit"; echo"</td>"; //nakalink sa edit user?>
	
	<form name="edit" action="edit_checkbox" method="post">
	<td><input type="radio" name="edit[]" id="air" value="<?php echo $row->id;?>" /></td>
	<td><input type="submit" value="EDIT" /></td>
	</form>
	
	<?php echo "<td>"; echo "Delete:"; echo"</td>"; //nakalink sa delete user
	?>
	<form name="forms" action="delete_checkbox" method="post">
	<td><input type="checkbox" name="forms[]" id="air" value="<?php echo $row->id;?>" /></td>
	
	<br>
	</tr>
	<?php endforeach;?>
	</table>
	
	<input type="submit" value="DELETE" class="button"/> </form>
	
	

	

<tbody>

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





