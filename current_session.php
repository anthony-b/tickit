	<?php
	session_name('tick-it');
	session_start();
	if(empty($_SESSION['username']))
	{
	header('Location: login.php');
	};
	?>