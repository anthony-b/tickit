<?php
class permissions{
	function __construct(){
		$username = $_SESSION['username'];
		require '../db/class_db_connect.php';
		require '../config.php';

		global $delete_ticket;
		$fetch_account_type = $db->prepare("SELECT account_type FROM agent WHERE username = '$username';");
		$fetch_account_type->execute();
		$result_account_type = $fetch_account_type->fetch(PDO::FETCH_ASSOC);

		if($result_account_type['account_type'] == 'agent'){
			$delete_ticket = '';
		};
		if($result_account_type['account_type'] == 'manager' || $result_account_type['account_type'] == 'admin'){
			$delete_ticket = '<a class="delete_ticket btn btn-danger" href="'.$url_root.'tickets/delete.php?ticketid='.$_GET["ticketid"].'"><span class="glyphicon glyphicon-trash"></span> Delete Ticket</a>';
		};

	}
}