<?php

class load_profile{
	//need to add profile page
	function __construct($user_id){
		require "../db/class_db_connect.php";
	$query = $db->prepare('SELECT id FROM agent WHERE id = "$user_id";');
	$query->execute();

}
}

class create_profile{

	function __construct($username,$firstname,$lastname,$emailaddress,$account_type,$department,$team){
		require "../db/class_db_connect.php";
		$sql = "INSERT INTO agent (id,username,firstname,lastname,emailaddress,account_type,department,team)VALUES(null,'$username','$firstname','$lastname','$emailaddress','$account_type','$department','$team');";
		$query = $db->prepare($sql);
		$query->execute();

	}
}
?>