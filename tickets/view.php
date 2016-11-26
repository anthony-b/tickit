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
                <div class="col-sm-4">
                    <h1>Ticket: #<?php echo $ticket_id ?></h1>
                </div>
                <div class="col-sm-8">
                    <h1 class="text-right"><?php echo $ticket_subject ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h1><small>Creator: <?php echo $ticket_creator ?></small></h1>
                </div>
                <div class="col-sm-6">
                    <h1 class="text-right"><small>Assigned To: <?php echo $ticket_assigned_to ?></small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h3><small>Priority: <?php echo $ticket_priority ?></small></h3>
                </div>
                <div class="col-sm-6">
                    <h3 class="text-right"><small>Date Created: <?php echo $ticket_date_created ?></small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="well"><h4>Description</h4><hr><?php echo html_entity_decode($ticket_description); ?><div class="clearfix"></div></div>
                </div>
            </div>
            <div class="row">
            <div id="statusupdate"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-inline " method="post" action="">
                        <div class="form-group">
                        <input type="hidden" id="ticketid" value="<?php echo $_GET['ticketid'];?>">
                        <select class="form-control" id="ticketstatus">
                            <option value="resolved">Resolved</option>
                            <option value="closed">Closed</option>
                            <option value="on hold">On Hold</option>
                        </select>
                        </div>
                        <input type="submit" class="btn btn-success" id="ticketstatus_button" value="Submit">

                    </form>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6"></div><div class="col-md-6"><span class="pull-right"><?php echo $edit_ticket;?> <?php echo $delete_ticket;?></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form class="add_reply" method="post" action="">
                        <div class="form-group">
                            <input type="hidden" name="respondant_username" value="<?php echo $_SESSION['username'];?>">
                            <input type="hidden" name="date_added" value="<?php echo date('Y-m-d'); ?>">
                            <input type="hidden" name="ticket_id" value="<?php echo $_GET['ticketid'];?>">
                            <label for="reply_description">Reply</label>
                            <textarea class="form-control" name="reply_description"></textarea>
                        </div>
                        <div class="form-group">
                            <input  class="btn btn-success pull-right" type="submit">
                        </div>
                    </form>
                </div>
            </div>

            <?php
                        
                        new view_ticket_replies($_GET['ticketid']);
            ?>
        </div>
    </body>
</html>