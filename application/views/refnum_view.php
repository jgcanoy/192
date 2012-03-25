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
    <li class="on"><a href="/192/" >Home</a> </li>
     <li ><a href="account.php">Account</a>
	 <ul>
		<li><a href=\"account.php\">User</a></li>
		<li class=\"contact\"><a href=\"company.php\">Company</a></li>
	</ul>
	 </li>
	 <li><a href=\"adduser.php\" >Add User</a></li>
	<li><a href=\"report.php\" style=\"font-size: 11px;\">View Reports</a></li>
     <li class="contact"><a href="signout.php">Sign Out</a></li>
  </ul>
  </div>
</div>

<div id="requestview">
	Reference Number: <?=$refnum?> <br />
	Name: <?=$username?> <br />
	Date Created: <?=$date?> <br />
	
</div>

</body>
</html>