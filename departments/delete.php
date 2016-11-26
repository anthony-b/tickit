<?php
require "../current_session.php";
require "../classes/department.class.php";
require "../config.php";
$destroy_dept = new department($_GET['id']);
$destroy_dept->destroyDeptFunct();
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
                <div class="col-sm-12">
                    <h1>Department Deleted</h1>
                </div>
            </div>
        </div>
    </body>
</html>