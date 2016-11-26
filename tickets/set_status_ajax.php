<?php
require "../current_session.php";
require "../classes/ticket.class.php";
require "../classes/permissions.class.php";
require "../config.php";
new close_ticket($_GET['status'],$_GET['ticketid']);
?>
<div class="alert alert-success" role="alert">Ticket status changed to <?php echo $_GET['status']; ?></div>