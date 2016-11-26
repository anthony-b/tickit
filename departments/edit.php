<?php
require_once "../current_session.php";
require_once "../config.php";
require_once "../classes/department.class.php";
$dept = new department($_GET['id']);

if(isset($_POST['edited'])){
$dept->editDeptFunct($_POST['department_name'],$_POST['department_emailaddress'],$_POST['department_password']);

}
$dept_var = $dept->viewDeptFunct();
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
                    <h1>Edit Department</h1>
                    <form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-group">
                            <label for="department_name" class="col-md-2 control-label">Department Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="department_name" id="department_name" value="<?php echo $dept_var['name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_emailaddress" class="col-md-2 control-label">Department Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" name="department_emailaddress" id="department_emailaddress" value="<?php echo $dept_var['emailaddress'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="department_password" id="department_password" value="<?php echo $dept_var['password'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                            <input type="hidden" name="edited" value="yes">
                                <button id="edit_department" type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>