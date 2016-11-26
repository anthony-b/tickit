<?php

class view_departments{

	function view_departments(){
	require_once "../db/class_db_connect.php";
	$view_departments_query = $db->prepare("SELECT * FROM department;");
	$view_departments_query->execute();
	$view_departments_rowcount = $view_departments_query->rowCount();

	echo '<table class="table table-striped">';
echo '<tr><td>Name</td><td>Email Address</td><td></td><td></td></tr>';
for($x_view_departments = 1; $x_view_departments <= $view_departments_rowcount; $x_view_departments++){
$view_departments_result = $view_departments_query->fetch(PDO::FETCH_ASSOC);
echo "<td>" .$view_departments_result['name']."</td><td>".$view_departments_result['emailaddress']."</td><td><a class='btn btn-primary' href='edit.php?id=".$view_departments_result['id']."'><span class='glyphicon glyphicon-pencil'></span></a></td><td><a class='btn btn-danger' href='delete.php?id=".$view_departments_result['id']."'><span class='glyphicon glyphicon-trash'></span></a></td>";
echo '</tr>';
};
echo "</table>";
}
}

class new_department{
	function __construct($name, $email, $password){
		require_once "../db/class_db_connect.php";
		$duplicate_check_department_query = $db->prepare("SELECT name,emailaddress FROM department where emailaddress = '$email' OR name = '$name';");
		$duplicate_check_department_query->execute();
		$duplicate_check_department_query_rowcount = $duplicate_check_department_query->rowCount();

		if($duplicate_check_department_query_rowcount < 1){
			$new_department_query = $db->prepare("INSERT INTO department (id, name, emailaddress, password) VALUES (NULL, '$name', '$email', '$password');");
			$new_department_query->execute();

			$write_check_new_department_query = $db->prepare("SELECT name,emailaddress FROM department where emailaddress = '$email' OR name = '$name';");
			$write_check_new_department_query->execute();
			$write_check_new_department_query_rowcount = $write_check_new_department_query->rowCount();

			if ($write_check_new_department_query_rowcount == 1){
					echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Department Added</div>';
			}else{
				echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>There was an error adding the department</div>';
			}
		}else{
			echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error: Department Aready Exists With This Name Or Email Address!</div>';

		}
	}
}

class department{
	public $departmentid;
	function __construct($todestroy){
		$this->departmentid = $todestroy;
	}

	function viewDeptFunct(){
		require "../db/class_db_connect.php";
		require "../config.php";
		$fetch_view_sql = "SELECT * FROM department WHERE id = '$this->departmentid'";
		$fetch_view_dept_sql = $db->prepare($fetch_view_sql);
		$fetch_view_dept_sql->execute();
		$fetch_view_dep_result = $fetch_view_dept_sql->fetch(PDO::FETCH_ASSOC);
		return $fetch_view_dep_result;
	}

	function destroyDeptFunct(){
		require "../db/class_db_connect.php";
		require "../config.php";
		$sql = "DELETE FROM department WHERE id = '$this->departmentid'";
		$destroy_dept_sql = $db->prepare($sql);
		$destroy_dept_sql->execute();
	}
	function editDeptFunct($name,$emailaddress,$password){
		require "../db/class_db_connect.php";
		require "../config.php";
		$edit_sql = "UPDATE department SET name = '$name', emailaddress = '$emailaddress', password = '$password' WHERE id = '$this->departmentid'";
		$edit_dept_sql = $db->prepare($edit_sql);
		$edit_dept_sql->execute();
		return '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Department Changed</div>';

	}
}

?>