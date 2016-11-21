<?php
session_name('tick-it');
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
};
require "classes/fetch_tickets.php";
$fetch_tickets_dept = new fetch_tickets_dept($_SESSION['username']);
$fetch_tickets_team = new fetch_tickets_team($_SESSION['username']);
$fetch_tickets_agent = new fetch_tickets_agent($_SESSION['username']);
?>