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
                    <h1>Add New Department</h1>
                    <form class="form-horizontal" role="form" method="get" action="#">
                        <div class="form-group">
                            <label for="department_name" class="col-md-2 control-label">Department Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="department_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_emailaddress" class="col-md-2 control-label">Department Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="department_emailaddress">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="department_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button id="add_department" type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12" id="confirm_alerts"></div>
                </div>
            </div>
        </div>
    </body>
</html>