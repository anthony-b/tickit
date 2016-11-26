<?php


class fetch_tickets_dept{

	function __construct($username){
		require 'db/class_db_connect.php';
$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);

//fetch Departments tickets
$query_dept = $db->prepare("SELECT * FROM tickets WHERE assigned_to like '%$result_agent_dept[department]%' AND status NOT IN ('closed','resolved');");
$query_dept->execute();
$count_dept = $query_dept->rowCount();

echo '<table class="table table-striped">';
echo '<tr><td>Ticket ID</td><td>Subject</td><td>Replies</td><td>Creator</td><td>Assigned To</td><td>Priority</td><td>Date Created</td><td></td></tr>';
for($x_dept = 1; $x_dept <= $count_dept; $x_dept++){
$result_dept = $query_dept->fetch(PDO::FETCH_ASSOC);
	


		$hasread_array = explode(",",$result_dept['hasread']);
		if(!in_array($_SESSION['username'], $hasread_array)){
			$status  = $result_dept['status'];
		}else{
			$status = '';
		}

	$reply_query = $db->prepare("SELECT * FROM ticket_replies WHERE ticket_id = '$result_dept[id]';");
	$reply_query->execute();
	$reply_rowcount = $reply_query->rowCount();
if ( strtolower($result_dept['priority']) == "urgent"){
echo '<tr class="danger '. $status.'">';
}elseif ( strtolower($result_dept['priority']) == "high"){
echo '<tr class="warning '. $status.'">';
}elseif ( strtolower($result_dept['priority']) == "normal"){
echo '<tr class=" '. $status.'">';
}
echo "<td>" .$result_dept['id']."</td><td>".$result_dept['subject']."</td><td>".$reply_rowcount."</td><td>".$result_dept['creator']."</td><td>".$result_dept['assigned_to']."</td><td>".$result_dept['priority']."</td><td>".$result_dept['date_created']."</td><td><a href='tickets/view.php?ticketid=".$result_dept['id']."'>View</a></td>";
echo '</tr>';
};
echo "</table>";
}
}

class fetch_tickets_agent{
function __construct($username){
		require 'db/class_db_connect.php';
		$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);

//fetch agents tickets
$query_agent = $db->prepare("SELECT * FROM tickets WHERE assigned_to like '%$username%' AND status NOT IN ('closed','resolved');");
$query_agent->execute();
$count_agent = $query_agent->rowCount();
echo '<table class="table table-striped">';
echo '<tr><td>Ticket ID</td><td>Subject</td><td>Replies</td><td>Creator</td><td>Assigned To</td><td>Priority</td><td>Date Created</td><td></td></tr>';
for($x_agent = 1; $x_agent <= $count_agent; $x_agent++){
$result_agent = $query_agent->fetch(PDO::FETCH_ASSOC);

$hasread_array = explode(",",$result_agent['hasread']);
		if(!in_array($_SESSION['username'], $hasread_array)){
			$status  = $result_agent['status'];
		}

$reply_query = $db->prepare("SELECT * FROM ticket_replies WHERE ticket_id = '$result_agent[id]';");
	$reply_query->execute();
	$reply_rowcount = $reply_query->rowCount();
if ( strtolower($result_agent['priority']) == "urgent"){
echo '<tr class="danger '. $status.'">';
}elseif ( strtolower($result_agent['priority']) == "high"){
echo '<tr class="warning '. $status.'">';
}elseif ( strtolower($result_agent['priority']) == "normal"){
echo '<tr class=" '. $status.'">';
};
echo "<td>".$result_agent['id']."</td><td>".$result_agent['subject']."</td><td>".$reply_rowcount."</td><td>".$result_agent['creator']."</td><td>".$result_agent['assigned_to']."</td><td>".$result_agent['priority']."</td><td>".$result_agent['date_created']."</td><td><a href='tickets/view.php?ticketid=".$result_agent['id']."'>View</a></td>";
echo "</tr>";
};
echo "</table>";
}
}

class fetch_tickets_created_by_user{
function __construct($username){
		require 'db/class_db_connect.php';
		$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);

//fetch agents tickets
$query_agent = $db->prepare("SELECT * FROM tickets WHERE creator like '%$username%' AND status NOT IN ('closed','resolved');");
$query_agent->execute();
$count_agent = $query_agent->rowCount();
echo '<table class="table table-striped">';
echo '<tr><td>Ticket ID</td><td>Subject</td><td>Replies</td><td>Creator</td><td>Assigned To</td><td>Priority</td><td>Date Created</td><td></td></tr>';
for($x_agent = 1; $x_agent <= $count_agent; $x_agent++){
$result_agent = $query_agent->fetch(PDO::FETCH_ASSOC);

$hasread_array = explode(",",$result_agent['hasread']);
		if(!in_array($_SESSION['username'], $hasread_array)){
			$status  = $result_agent['status'];
		}

$reply_query = $db->prepare("SELECT * FROM ticket_replies WHERE ticket_id = '$result_agent[id]';");
	$reply_query->execute();
	$reply_rowcount = $reply_query->rowCount();
if ( strtolower($result_agent['priority']) == "urgent"){
echo '<tr class="danger '. $status.'">';
}elseif ( strtolower($result_agent['priority']) == "high"){
echo '<tr class="warning '. $status.'">';
}elseif ( strtolower($result_agent['priority']) == "normal"){
echo '<tr class=" '. $status.'">';
};
echo "<td>".$result_agent['id']."</td><td>".$result_agent['subject']."</td><td>".$reply_rowcount."</td><td>".$result_agent['creator']."</td><td>".$result_agent['assigned_to']."</td><td>".$result_agent['priority']."</td><td>".$result_agent['date_created']."</td><td><a href='tickets/view.php?ticketid=".$result_agent['id']."'>View</a></td>";
echo "</tr>";
};
echo "</table>";
}
}
//$fetch = new fetch_tickets(); use this ti display ticket list


