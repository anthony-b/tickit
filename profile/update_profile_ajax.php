<?php
require "../current_session.php";
require "class.profile.php";
require "../classes/permissions.class.php";
require "../config.php";
if($_POST){
 new edit_profile($_POST['firstname'],$_POST['lastname'],$_POST['profilepic']);
}
?>
<div class="alert alert-success" role="alert">Your profile has been updated.</div>