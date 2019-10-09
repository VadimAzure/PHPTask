<?php
	require_once 'core.php';

	if(ISSET($_POST['add'])){
		if(($_POST['name'] != "") && ($_POST['email'] != "") && ($_POST['task'] != "")){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$task = $_POST['task'];
			$conn->query("INSERT INTO `task` (`task_id`, `status`, `name`, `email`, `task`) VALUES ('', '', '$name', '$email', '$task')");
			header('location:index.php');
		}	
	}
?>
