<?php
require "current_session.php";
require "class.session.php";
require "config.php";
require "db/class_db_connect.php";
if(isset($_POST['name'])){
$name = $_POST['name'];
$ajax_assigned_to_query_dept = $db->prepare("SELECT department.name FROM department WHERE department.name like '%$name%'");
$ajax_assigned_to_query_dept->execute();
while($ajax_assigned_to_query_result_dept = $ajax_assigned_to_query_dept->fetch(PDO::FETCH_ASSOC)){
?>
<li class="btn btn-success btn-xs" onclick='fill("<?php echo $ajax_assigned_to_query_result_dept['name']; ?>")'><?php echo $ajax_assigned_to_query_result_dept['name']; ?></li>
<?php
}


$ajax_assigned_to_query_agent = $db->prepare("SELECT agent.username FROM agent WHERE agent.username like '%$name%'");
$ajax_assigned_to_query_agent->execute();
while($ajax_assigned_to_query_result_agent = $ajax_assigned_to_query_agent->fetch(PDO::FETCH_ASSOC)){
?>
<li class="btn btn-warning btn-xs" onclick='fill("<?php echo $ajax_assigned_to_query_result_agent['username']; ?>")'><?php echo $ajax_assigned_to_query_result_agent['username']; ?></li>

<?php
}
}
 ?>
