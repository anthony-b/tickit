<?php
require "../current_session.php";
require "../classes/permissions.class.php";
require "../config.php";

if($_SESSION['accounttype'] == 'admin'){
require "../classes/department.class.php";
}else{
    class view_departments{
        function view_departments(){
            echo "<h1>You do not have permission to view the departments";
        }
    }
}
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
                    <h1>Departments<a class="btn btn-success pull-right" href="new.php">New Department</a></h1>
                    <?php new view_departments() ?>
                    
                </div>
            </div>
        </div>
    </body>
</html>