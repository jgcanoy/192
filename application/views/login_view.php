
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" type="image/x-icon" href="/192/images/icon.png">
	<title><?=$title?></title>
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
</script><!--
<script type="text/javascript" src="/192/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/192/js/infiniteCarousel/jquery.infinitecarousel.js"></script>
<script type="text/javascript">
$(function(){
	$('#carousel').infiniteCarousel();
});
</script>-->
</head>

<body>
<div id="header_container">
<div id="header">
	<a href="index.html"><img src="/192/images/logo.gif" alt="ExQuest" title="ExQuest" border="0" /></a>
	<ul>
		<li class="on"><a href="index.php" >Home</a> </li>
		<li ><a href="#bodymiddlePan">About us</a></li>
		<li ><a href="new.php">Advantages</a></li>
		<li ><a href="faqs.php">FAQs</a></li>
		<li class="contact"><a href="contact.php">Contact Us</a></li>
	</ul><!--
<div id="carousel">
<ul>
	<li><img alt="" src="/192/js/banner1.jpg" width="580" height="188" /></li>
	<li><img alt="" src="/192/images/banner2.jpg" width="580" height="188" /></li>
	<li><img alt="" src="/192/images/banner3.jpg" width="580" height="188" /></li>
	<li><img alt="" src="/192/images/banner4.jpg" width="580" height="188" /></li>
	<li><img alt="" src="/192/images/banner5.jpg" width="580" height="188" /></li>

</ul>
</div>-->

	<h1></h1>
</div>
</div>
<div id="body1"><?=form_open('/main/check/')?>
	<label>User Login:</label>
	<input name="email" type="text" value="Email address here..." onFocus="this.value=''" />
	<input name="pass" type="password" value="Password" onFocus="this.value=''"/>
	<input name="" type="submit" class="botton" value="GO" />
	<a href="#" onclick="toggle('body1hidden');"><font color="yellow">Register here. </font></a>
</form>
</div>
<div id="body1hidden"><?=form_open('/main/mailkey')?>
	<label>Register:</label>
	<input name="email" type="text" value="Email address here..." onFocus="this.value=''"/>
	<input name="" type="submit" class="botton" value="SUBMIT" />
	<p class="quote">* A link will be sent to your e-mail address for activation.</p>
</form>
</div>
<div id="bodymiddlePan">
	<h2>About ExQuest</h2>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ExQuest is an online expense monitoring system designed to track down all expenses made by a company or organization. It will allow companies and organizations to conveniently make requests and approve expense requests just by accessing the Internet.</p><br />
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For inquiries and help, <a href="contact.php"><font color="white">contact us</font></a></p>
</div>
<div id="bodyBottomPan">
  <div id="infoPan">
  	<h2>more info</h2>
	<p>tortor porttito sollicitudin</p>
	<p class="view"><a href="#">view</a></p>
  </div>
  <div id="servicesPan">
  	<h2>services</h2>
	<p>tortor porttito sollicitudin</p>
	<p class="view"><a href="#">view</a></p>
  </div>
  <div id="schedulePan">
  	<h2>schedule</h2>
	<p>tortor porttito sollicitudin</p>
	<p class="view"><a href="#">view</a></p>
  </div>
</div>
<div id="bottomPan">
  <div id="bottomMainPan">
  	<div id="bottomBorderPan">
		<h2>more tips</h2>
		<h3>more links</h3>
		<h4>announcements </h4>
		<ul>
			<li><a href="#">Lorem Ipsum has been the</a></li>
			<li><a href="#">industry's standard dum</a></li>
			<li><a href="#">text ever since the 1500s, </a></li>
			<li><a href="#">when an unknown printer</a></li>
		</ul>
		<ul>
			<li><a href="#">Lorem Ipsum has been the</a></li>
			<li><a href="#">industry's standard dum</a></li>
			<li><a href="#">text ever since the 1500s, </a></li>
			<li><a href="#">when an unknown printer</a></li>
		</ul>
		<ul>
			<li><a href="#">Lorem Ipsum has been the</a></li>
			<li><a href="#">industry's standard dum</a></li>
			<li><a href="#">text ever since the 1500s, </a></li>
			<li><a href="#">when an unknown printer</a></li>
		</ul>
	</div>
  </div>
</div>
<div id="footermainPan">
  <div id="footerPan">
  	<div id="footerlogoPan"><a href="index.html"><img src="/192/images/footerlogo.gif" title="ExQuest" alt="ExQuest" width="180" height="36" border="0" /></a></div>
	<ul>
  	<li><a href="index.php">Home</a>| </li>
  	<li><a href="index.php#bodymiddlePan">About</a> | </li>
  	<li><a href="new.php">Advantages</a>| </li>
  	<li><a href="faqs.php">FAQs</a> |</li>
	<li><a href="contact.php">Contact Us</a> </li>
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
