<?php
require 'send_mail.php';
if(isset($_POST['name'])){
	
	$email = new send_mail($_POST['name'],$_POST['subject']);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="#">
<input name="name">
<select name="subject">
<option value="OOP Test"> OOP Test</option>
<option value="Fire Alarm">Fire Alarm</option>
</select>
<button type="submit">Submit
</button>
</form>
</body>
</html>