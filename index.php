<?php
require "current_session.php";
require "class.session.php";
 require "config.php";
require "classes/fetch_tickets.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tick-It!</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<?php include "nav.php"; ?>
<div class="container">
<h1>Tickets Assigned To The Department</h1>
<?php
new fetch_tickets_dept($_SESSION['username']);
?>
<h1>Tickets Assigned To Me</h1>
<?php
new fetch_tickets_agent($_SESSION['username']);
?>
<h1>Tickets I Have Created</h1>
<?php
new fetch_tickets_created_by_user($_SESSION['username']);
?>
</div>

</body>
</html>