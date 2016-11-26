<?php
session_name('tick-it');
session_start();

require "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $_POST['username'];

$ds=ldap_connect(LDAP_HOST, LDAP_PORT);

$dn="uid=".$username.",".LDAP_USERS_DN.",".LDAP_BASE_DN;
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

if(isset($_POST['username'])){
if ($bind=ldap_bind($ds, $dn, $password)) {

  require "db/class_db_connect.php";
  $query = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
  $query->execute();
  $session_vars_query = $query->fetch(PDO::FETCH_ASSOC);
  $_SESSION['firstname'] = $session_vars_query['firstname'];
  $_SESSION['lastname'] =  $session_vars_query['lastname'];
  $_SESSION['emailaddress'] =  $session_vars_query['emailaddress'];
  $_SESSION['accounttype'] =  $session_vars_query['account_type'];
  $_SESSION['department'] =  $session_vars_query['department'];
  $_SESSION['team'] =  $session_vars_query['team'];
  if($query->rowCount() < 1){

    header('Location: profile/new.php');
    exit();
  }else{
  	header('Location: index.php');
    exit();

  }
} else {

 echo "Login Failed: Please check your username or password";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tick-It!</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="styles/login.css">
  <!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<div class="home container">
<div class="wrapper">
<form action="" method="post" class="form-signin">
<h3 class="form-signin-heading">Tick-It!</h3>
<p>To create a ticket just log in with the first part of your <b>email address</b> (the bit before the @ symbol) and your <b>email password</b> as the password.</p>
        <hr class="colorgraph"><br>
<div class="form-group">
<label for="username">Username</label>
<input class="form-control" name="username">
</div>
<div class="form-group">
<label for="password">Password</label>
<input class="form-control" type="password" name="password">
</div>
<input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">
</form>
</div>
</div>
</body>
</html>