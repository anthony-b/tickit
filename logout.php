<?php 
require_once "current_session.php";
require_once "class.session.php";
if($_GET['logout']== true){
	logout();
}
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
<h1>Thank you for using Tick-it!</h1>
</div>
</body>
</html>