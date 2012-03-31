<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="/192/images/icon.png">
	<title>ExQuest | Home</title>
	<link href="/192/css/theme.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/192/js/jquery-ui-1.7.1/themes/base/ui.all.css">
	<script type="text/javascript" src="/192/js/jquery-1.4.1.js"></script>
	<script src="/192/js/jquery-ui-1.7.1/ui/ui.core.js"></script>
	<script src="/192/js/jquery.ui.widget.js"></script>
	<script src="/192/js/jquery-ui-1.7.1/ui/ui.datepicker.js"></script>
	<script type="text/javascript">
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
     <li class="contact"><?=anchor('/main/logout', 'Sign Out')?></li>
  </ul>
  </div>
</div>

<div id="reqPan">
