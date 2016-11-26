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
                    <h1>Settings <small>Change these settings in the config.php file.</small></h1>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="#ldap" aria-controls="ldap" role="tab" data-toggle="tab">LDAP</a></li>
                        <li role="presentation" ><a href="#database" aria-controls="database" role="tab" data-toggle="tab">Database</a></li>
                        <li role="presentation" ><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Email</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="ldap">
                        	<h1>LDAP</h1>
                        	<table class="table table-striped">
                        		<tr>
                        			<td><b>Host</b></td>
                        			<td><?php echo LDAP_HOST; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Port</b></td>
                        			<td><?php echo LDAP_PORT; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Base DN</b></td>
                        			<td><?php echo LDAP_BASE_DN; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Users CN/OU</b></td>
                        			<td><?php echo LDAP_USERS_DN; ?></td>
                        		</tr>
                        	</table>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="database">
                        	<h1>Database</h1>
                        	<table class="table table-striped">
                        		<tr>
                        			<td><b>Host</b></td>
                        			<td><?php echo DB_HOST; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Name</b></td>
                        			<td><?php echo DB_NAME; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Username</b></td>
                        			<td><?php echo DB_USERNAME; ?></td>
                        		</tr>
                        		<tr>
                        			<td><b>Character Set</b></td>
                        			<td><?php echo DB_CHARSET; ?></td>
                        		</tr>
                        	</table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="email">Email</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>