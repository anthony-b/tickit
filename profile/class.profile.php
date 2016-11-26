<?php

class view_profile{

	function __construct(){
		require "../current_session.php";
		global $emailaddress;
		global $firstname;
		global $lastname;
		global $accounttype;
		global $department;
		global $profilepicurl;
		$username = $_SESSION['username'];
		require "../db/class_db_connect.php";
		$sql = "SELECT * FROM agent WHERE username = '$username';";
		$edit_profile_query = $db->prepare($sql);
		$edit_profile_query->execute();
		$edit_profile_result = $edit_profile_query->fetch(PDO::FETCH_ASSOC);
		$emailaddress = $edit_profile_result['emailaddress'];
		$firstname = $edit_profile_result['firstname'];
		$lastname = $edit_profile_result['lastname'];
		$accounttype = $edit_profile_result['account_type'];
		$department = $edit_profile_result['department'];
		$profilepicurl = $edit_profile_result['profilepic_url'];
	}
}

class edit_profile{
	
}

?>