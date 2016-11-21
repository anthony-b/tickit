<?php
session_name('tick-it');
session_start();
require "class.profile.php";
if(isset($_POST['create'])){
	$create_profile = new create_profile($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['emailaddress'],$_POST['account_type'],$_POST['department'],$_POST['team']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
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
    </body>
</html>