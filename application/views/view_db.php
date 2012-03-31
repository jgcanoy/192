<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	
</head>
<body>

<div id="container">
	<div
	<?php
	echo "<br>";
	foreach($results as $row){
	echo $row->id;
	echo $row->email;
	echo "<br>";
	}
	?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>