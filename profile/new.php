<?php
require "../current_session.php";
require "class.profile.php";
require "../config.php";
if(isset($_POST['create'])){
	$create_profile = new create_profile($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['emailaddress'],$_POST['account_type'],$_POST['department'],$_POST['team']);
}
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
        	<input type="hidden" name="create">
            <label for="username">Username: </label>
            <input name="username" value="<?php echo $_SESSION['username']; ?>">
            <br>
            <label for="firstname">First Name: </label>
            <input name="firstname" value="">
            <br>
            <label for="lastname">Last Name: </label>
            <input name="lastname" value="">
            <br>
             <label for="emailaddress">Email Address: </label>
            <input name="emailaddress" value="">
            <br>
            <label for="account_type">Account Type: </label>
            <input name="account_type" value="">
            <br>
            <label for="department">Department: </label>
            <input name="department" value="">
            <br>
            <label for="team">Team: </label>
            <input name="team" value="">
            <br>
            <input type="submit" value="Submit">
        </form>
</div>

</body>
</html>