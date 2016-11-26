<?php
require "../current_session.php";
require "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tick-It!</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="../styles/style.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<?php include "../nav.php"; ?>
<div class="container">
<form action="" method="post">
<input name="username" value="">

<input type="submit" value="Submit">
</form>
</div>

</body>
</html>