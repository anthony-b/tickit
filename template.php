<?php
require "../current_session.php";
require "../classes/ticket.class.php";
require "../classes/permissions.class.php";
require "../config.php";
if(isset($_POST['respondant_username'])){
new new_reply($_POST['respondant_username'],$_POST['date_added'],$_POST['ticket_id'],$_POST['reply_description']);
}
new view_ticket($_GET['ticketid']);
new permissions();


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

        <script src="../scripts.js"></script>
    </head>
    <body>
        <?php include "../nav.php"; ?>
        <div class="container">
            
            
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </body>
</html>