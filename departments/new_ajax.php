<?php
require "../current_session.php";
require "../classes/department.class.php";
require "../classes/permissions.class.php";
require "../config.php";
$department_name = $_POST['department_name'];
$department_email = $_POST['department_email'];
$department_password = $_POST['department_password'];
new new_department($department_name,$department_email,$department_password);
?>