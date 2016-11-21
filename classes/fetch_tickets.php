<?php
class fetch_tickets_dept{
	function __construct($username){
		require '../db/class_db_connect.php';
$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);

//fetch Departments tickets
$query_dept = $db->prepare("SELECT * FROM tickets, agent WHERE tickets.assigned_to = '$result_agent_dept[department]';");
$query_dept->execute();
$count_dept = $query_dept->rowCount();
for($x_dept = 1; $x_dept <= $count_dept; $x_dept++){
$result_dept = $query_dept->fetch(PDO::FETCH_ASSOC);
echo "ID: ".$result_dept['id']." |  Subject: ".$result_dept['subject']." |  Creator: ".$result_dept['creator']." |  Assigned to: ".$result_dept['assigned_to']." |  Priority: ".$result_dept['priority']." |  Date created: ".$result_dept['date_created']."<hr>";

};
}
}

class fetch_tickets_team{
function __construct($username){
		require '../db/class_db_connect.php';
		$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);
		//fetch teams tickets
$query_teams = $db->prepare("SELECT * FROM tickets, agent WHERE tickets.assigned_to = '$result_agent_dept[team]';");
$query_teams->execute();
$count_teams = $query_teams->rowCount();
for($x_teams = 1; $x_teams <= $count_teams; $x_teams++){
$result_teams = $query_teams->fetch(PDO::FETCH_ASSOC);
echo "ID: ".$result_teams['id']." |  Subject: ".$result_teams['subject']." |  Creator: ".$result_teams['creator']." |  Assigned to: ".$result_teams['assigned_to']." |  Priority: ".$result_teams['priority']." |  Date created: ".$result_teams['date_created']."<hr>";

};
}
}
class fetch_tickets_agent{
function __construct($username){
		require '../db/class_db_connect.php';
		$fetch_agent_dept = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
$fetch_agent_dept->execute();
$result_agent_dept = $fetch_agent_dept->fetch(PDO::FETCH_ASSOC);

//fetch agents tickets
$query_agent = $db->prepare("SELECT * FROM tickets, agent WHERE tickets.assigned_to = '$username';");
$query_agent->execute();
$count_agent = $query_agent->rowCount();
for($x_agent = 1; $x_agent <= $count_agent; $x_agent++){
$result_agent = $query_agent->fetch(PDO::FETCH_ASSOC);
echo "ID: ".$result_agent['id']." |  Subject: ".$result_agent['subject']." |  Creator: ".$result_agent['creator']." |  Assigned to: ".$result_agent['assigned_to']." |  Priority: ".$result_agent['priority']." |  Date created: ".$result_agent['date_created']."<hr>";

};
}
}
//$fetch = new fetch_tickets(); use this ti display ticket list


