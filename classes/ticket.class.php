<?php 
class view_ticket{
	function __construct($ticketid){
		require "../db/class_db_connect.php";
		require "../config.php";
		$query = $db->prepare("SELECT * FROM tickets WHERE tickets.id = '$ticketid';");
		$query->execute();
		$ticket_result = $query->fetch(PDO::FETCH_ASSOC);
		global $ticket_id;
		global $ticket_subject;
		global $ticket_description;
		global $ticket_creator;
		global $ticket_assigned_to;
		global $ticket_priority;
		global $ticket_date_created;
		global $edit_ticket;
		$username = $_SESSION["username"];
		$user_query = $db->prepare("SELECT * FROM agent WHERE username = '$username';");
		$user_query->execute();
		$user_result = $user_query->fetch(PDO::FETCH_ASSOC);
		$assigned_to_explode = explode(",", $ticket_result["assigned_to"]);
		 $userrole = array($user_result["username"],$user_result["department"],$user_result["team"]);

		$hasread_array = explode(",",$ticket_result['hasread']);
		if(!in_array($_SESSION['username'], $hasread_array)){
			array_push($hasread_array, $_SESSION['username']);
			$hasread_array = implode(",", $hasread_array);
			$hasread_ticket_id =  $ticket_result["id"];
			$hasread_query = $db->prepare("UPDATE tickets SET hasread = '$hasread_array' WHERE id = '$hasread_ticket_id';");
			$hasread_query->execute();
		}


		if (array_intersect($assigned_to_explode, $userrole) || $_SESSION['accounttype'] == 'admin'){//this needs finishing, supposed to say if assigned to doesnt equal $username or team /dept then display message but may need to explode as assigned to may be an array
		
		$ticket_id = $ticket_result["id"];
		$ticket_subject = $ticket_result["subject"];
		$ticket_description = nl2br($ticket_result["description"]);
		$ticket_creator = $ticket_result["creator"];
		$ticket_assigned_to = $ticket_result["assigned_to"];
		$ticket_priority = $ticket_result["priority"];
		$ticket_date_created = $ticket_result["date_created"];
	}else{
		echo "You do not have permission to view this ticket.";
		die();
	}

		$edit_ticket = '<a class="delete_ticket btn btn-primary" href="'.$url_root.'tickets/edit.php?ticketid='.$_GET["ticketid"].'"><span class="glyphicon glyphicon-pencil"></span> Edit Ticket</a>';
	
	}
}

class view_ticket_replies{
	function __construct($ticketid){
		require "../db/class_db_connect.php";
		$reply_query = $db->prepare("SELECT * FROM ticket_replies WHERE ticket_id = '$ticketid' ORDER BY `ticket_replies`.`date_added` ASC;");
		$reply_query->execute();
		$reply_rowcount = $reply_query->rowCount();
		
		echo "<h2>Activity</h2><hr>";
		if ($reply_rowcount < 1){echo "<p><b>There is no activity yet.</b></p>";};
		for($x_reply = 1; $x_reply <= $reply_rowcount; $x_reply++){
			$reply_result = $reply_query->fetch(PDO::FETCH_ASSOC);
			

			?>
			<div class="panel panel-default">
  				<div class="panel-heading">
    				<h3 class="panel-title respondant_username"><?php echo $reply_result["respondant_username"]; ?></h3>
  				</div>
  				<div class="panel-body">
   					<?php echo $reply_result["reply"]; ?>
  				</div>
  				<div class="panel-footer text-right">
  					<small>Date Added: <?php echo $reply_result["date_added"]; ?></small>
  				</div>
			</div>
			<?php
			
		}
	}
}

class new_reply{
	function __construct($respondant_username,$date_added,$ticket_id,$reply_description){
		$status = "unread";

		$reply_description = htmlspecialchars($reply_description, ENT_QUOTES);
		require "../db/class_db_connect.php";
		$new_reply_query = $db->prepare("UPDATE tickets SET status = '$status' WHERE `id` = '$ticket_id';");
		$new_reply_query->execute();
		$new_reply_query = $db->prepare("INSERT INTO ticket_replies (respondant_username,reply,ticket_id,date_added) VALUES ('$respondant_username','$reply_description','$ticket_id','$date_added');");
		$new_reply_query->execute();

		$ticket_status_query = $db->prepare("SELECT * FROM tickets WHERE id = '$ticket_id';");
		$ticket_status_query->execute();
		$ticket_status_result = $ticket_status_query->fetch(PDO::FETCH_ASSOC);
		$ticket_status_clear = $db->prepare("UPDATE tickets SET hasread = '' WHERE id = '$ticket_id';");
		$ticket_status_clear->execute();

		$hasread_array = explode(",",$ticket_status_result['hasread']);
		if(!in_array($_SESSION['username'], $hasread_array)){
			array_push($hasread_array, $_SESSION['username']);
			$hasread_array = implode(",", $hasread_array);
			$hasread_ticket_id =  $ticket_status_result["id"];
			$hasread_query = $db->prepare("UPDATE tickets SET hasread = '$hasread_array' WHERE id = '$hasread_ticket_id';");
			$hasread_query->execute();
		}
	}
}

class new_ticket{
	function __construct($subject,$description,$creator,$assigned_to,$priority,$date_created){
		$status = "unread";
		$subject = htmlspecialchars($subject, ENT_QUOTES);
		$description = htmlentities($description);
		require "../db/class_db_connect.php";
		$description = htmlentities($description, ENT_QUOTES);
  		$query = $db->prepare("INSERT INTO tickets (subject, description, creator, assigned_to, priority, date_created, status) VALUES ('$subject', '$description', '$creator', '$assigned_to', '$priority','$date_created', '$status');");
  		$query->execute();
  		
	}
}

class edit_ticket{
	function __construct($subject,$description,$creator,$assigned_to,$priority,$date_created,$ticketid){
		$status = "unread";
		require "../db/class_db_connect.php";
		$description = htmlentities($description, ENT_QUOTES);
  		$query = $db->prepare("UPDATE tickets SET subject = '$subject', description = '$description', creator = '$creator', assigned_to = '$assigned_to', priority = '$priority', date_created = '$date_created', status = '$status' WHERE `tickets`.`id` = $ticketid;");
  		$query->execute();
  		
  		header("Location: view.php?ticketid=".$ticketid);
		die();
	}
}

class close_ticket{
	function __construct($status,$ticketid){
		require "../db/class_db_connect.php";
		$close_ticket_sql = "UPDATE tickets SET status = '$status' WHERE id = '$ticketid'";
		$close_ticket_query = $db->prepare($close_ticket_sql);
		$close_ticket_query->execute();
		
	}
}

class destroy_ticket{
	function __construct($ticketid){
		require "../db/class_db_connect.php";
		require "../config.php";
		$delete_ticket_sql = "DELETE FROM tickets WHERE id = '$ticketid'";
		$delete_ticket_query = $db->prepare($delete_ticket_sql);
		$delete_ticket_query->execute();
		header("Location: ".$root_url);
		
	}
}

function new_fetch_department_array($fetch_dept_type = "empty"){

	require "../db/class_db_connect.php";
	$fetch_dept_sql = $db->prepare("SELECT * FROM department;");
		$fetch_dept_sql->execute();
		$fetch_dept_sql_rowcount = $fetch_dept_sql->rowCount();
		if($fetch_dept_type == "dropdown"){
			echo "<optgroup label='Departments'>";
		}
		for($fetch_dept_sql_count = 1; $fetch_dept_sql_count <= $fetch_dept_sql_rowcount; $fetch_dept_sql_count++){
		$fetch_dept_sql_result = $fetch_dept_sql->fetch(PDO::FETCH_ASSOC);
		
		if($fetch_dept_type == "list"){
			echo "<li>".$fetch_dept_sql_result['name']."</li>";
		};
		if($fetch_dept_type == "dropdown"){
			echo "<option value='".$fetch_dept_sql_result['name']."'>".$fetch_dept_sql_result['name']."</option>";
		};
	if($fetch_dept_type == "empty"){
		echo $fetch_dept_sql_result['name'];
	};
	};
	if($fetch_dept_type == "dropdown"){
			echo "</optgroup>";
		}

};
function new_fetch_team_array($fetch_team_type = "empty"){

	require "../db/class_db_connect.php";
	$fetch_team_sql = $db->prepare("SELECT * FROM team;");
		$fetch_team_sql->execute();
		$fetch_team_sql_rowcount = $fetch_team_sql->rowCount();
		if($fetch_team_type == "dropdown"){
			echo "<optgroup label='Teams'>";
		}
		for($fetch_team_sql_count = 1; $fetch_team_sql_count <= $fetch_team_sql_rowcount; $fetch_team_sql_count++){
		$fetch_team_sql_result = $fetch_team_sql->fetch(PDO::FETCH_ASSOC);
		
		if($fetch_team_type == "list"){
			echo "<li>".$fetch_team_sql_result['name']."</li>";
		};
		if($fetch_team_type == "dropdown"){
			echo "<option value='".$fetch_team_sql_result['name']."'>".$fetch_team_sql_result['name']."</option>";
		};
	if($fetch_team_type == "empty"){
		echo $fetch_team_sql_result['name'];
	};
	};
	if($fetch_team_type == "dropdown"){
			echo "</optgroup>";
		}
};
function new_fetch_agent_array($fetch_agent_type = "empty"){

	require "../db/class_db_connect.php";
	$fetch_agent_sql = $db->prepare("SELECT * FROM agent;");
		$fetch_agent_sql->execute();
		$fetch_agent_sql_rowcount = $fetch_agent_sql->rowCount();
		if($fetch_agent_type == "dropdown"){
			echo "<optgroup label='Agents'>";
		}
		for($fetch_agent_sql_count = 1; $fetch_agent_sql_count <= $fetch_agent_sql_rowcount; $fetch_agent_sql_count++){
		$fetch_agent_sql_result = $fetch_agent_sql->fetch(PDO::FETCH_ASSOC);
		
		if($fetch_agent_type == "list"){
			echo "<li>".$fetch_agent_sql_result['username']."</li>";
		}
		if($fetch_agent_type == "dropdown"){
			echo "<option value='".$fetch_agent_sql_result['username']."'>".$fetch_agent_sql_result['username']."</option>";
		}
	if($fetch_agent_type == "empty"){
		echo $fetch_agent_sql_result['username'];
	}
	};
	if($fetch_agent_type == "dropdown"){
			echo "</optgroup>";
		}

};



?>