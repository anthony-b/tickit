<?php
require "../current_session.php";
require "../classes/ticket.class.php";
require "../config.php";
new view_ticket($_GET['ticketid']);
if(isset($_POST['edited'])){
new edit_ticket($_POST['subject'],$_POST['description'],$_POST['creator'],$_POST['assigned_to'],$_POST['priority'],$_POST['date_created'],$_POST['ticketid']);

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
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: ".wysiwyg-area",
                paste_data_images: true,
                plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | link unlink anchor | forecolor backcolor  | print preview code",
   image_advtab: true ,
   height: '400px',
   force_p_newlines : false,
force_br_newlines : false,
convert_newlines_to_brs : false,
remove_linebreaks : true,
forced_root_block : '',
   external_filemanager_path:"<?php echo ROOT_URL; ?>js/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "responsivefilemanager" : "<?php echo ROOT_URL; ?>js/tinymce/plugins/responsivefilemanager/plugin.min.js"}
            });

        </script>
    </head>
    <body>
        <?php include "../nav.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Edit Ticket: #<?php echo $ticket_id ?></h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Subject</label>
                            <input  class="form-control" type="text" name="subject" value="<?php echo $ticket_subject ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control wysiwyg-area" name="description"><?php echo $ticket_description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Assigned To</label>
                            <input class="form-control" name="assigned_to" id="assigned_to" value="<?php echo $ticket_assigned_to ?>">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                <input placeholder="Type to search..." class="form-control" name="assigned_to_search" id="assigned_to_search">
                            </div>
                            <div id="display_ajax"></div>
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" type="text" name="priority">
                                <option hidden disabled><?php echo $ticket_priority ?></option><option value="normal">Normal</option><option value="high">High</option><option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" hidden readonly type="hidden" name="date_created" value="<?php echo $ticket_date_created ?>">
                            <input type="hidden" name="ticketid" value="<?php echo $_GET['ticketid'];?>">
                            <input type="hidden" name="date_added" value="<?php echo date('Y-m-d'); ?>">
                            <input type="hidden" name="edited" value="yes">
                            <input id="edit_ticket_submit" class="btn btn-default" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>