<?php

require "../current_session.php";
require "class.profile.php";
require "../classes/permissions.class.php";
require "../config.php";
require "../db/class_db_connect.php";
$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
if(!empty($_FILES["fileToUpload"]["tmp_name"])){
    

        $target_dir = "profilepics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $error =  "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $error = "This file has already been uploaded, please rename the file";
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error =  "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error .=  " Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $maxDim = 250;
        list($width, $height, $type, $attr) = getimagesize( $_FILES['fileToUpload']['tmp_name'] );
        if ( $width > $maxDim || $height > $maxDim ) {
            $target_filename = $_FILES['fileToUpload']['tmp_name'];
            $fn = $_FILES['fileToUpload']['tmp_name'];
            $size = getimagesize( $fn );
            $ratio = $size[0]/$size[1]; // width/height
            if( $ratio > 1) {
                $width = $maxDim;
                $height = $maxDim/$ratio;
            } else {
                $width = $maxDim*$ratio;
                $height = $maxDim;
            }
            $src = imagecreatefromstring( file_get_contents( $fn ) );
            $dst = imagecreatetruecolor( $width, $height );
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
            imagedestroy( $src );
            imagepng( $dst, $target_filename ); // adjust format as needed
            imagedestroy( $dst );
        }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $upload_profile_image_sql = "UPDATE agent SET firstname = '$firstname', lastname = '$lastname', profilepic_url = 'profile/$target_file' WHERE username = '$_SESSION[username]';";
        $upload_profile_image_query = $db->prepare($upload_profile_image_sql);
        $upload_profile_image_query->execute();
        $success =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $error =  "Sorry, there was an error uploading your file.";
    }
}
    
//new edit_profile($_POST['firstname'],$_POST['lastname'],$_FILES["profilepic"]);
}
if(isset($firstname) || isset($lastname) && empty($_FILES["fileToUpload"]["tmp_name"])){
        $upload_profile_image_sql = "UPDATE agent SET firstname = '$firstname', lastname = '$lastname' WHERE username = '$_SESSION[username]';";
        $upload_profile_image_query = $db->prepare($upload_profile_image_sql);
        $upload_profile_image_query->execute();
        $success =  "Your profile has been updated.";
}
new view_profile();
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
                    <h1>Edit Profile</h1>
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="emailaddress">Email address</label>
                            <input type="email" readonly class="form-control" id="emailaddress" value="<?php echo $_SESSION['emailaddress'];?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text"  class="form-control" name="firstname" id="firstname" value="<?php echo $firstname;?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text"  class="form-control" name="lastname" id="lastname" value="<?php echo $lastname;?>">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" readonly class="form-control" id="department" value="<?php echo $department;?>">
                        </div>
                        <div class="form-group">

                            <img src="<?php echo $url_root.$profilepicurl;?>" alt="<?php echo $firstname;?>" class="img-thumbnail">
                            <label for="fileToUpload">Profile Image</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <input id="update_profile" name="submit" type="submit" class="btn btn-default" value="Update">
                    </form>
                    <?php if(isset($error)){?>
                     <div class="alert alert-danger" role="alert" id="confirm_alerts"><?php echo $error ;?></div>
                    <?php } ?>
                    <?php if(isset($success)){?>
                     <div class="alert alert-success" role="alert" id="confirm_alerts"><?php echo $success ;?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>