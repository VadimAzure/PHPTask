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

<!--INSERT INTO `task` (`task_id`, `status`, `name`, `email`, `task`) VALUES ('2', '', 'Вадим', 'm@mail.ru', 'Second');

if(($_POST['task'] != "") && ($_POST['task'] != "") && ($_POST['task'] != "")){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$task = $_POST['task'];
	$conn->query("INSERT INTO `task` (`name`, `email`, `task`) VALUES ($name', '$email', '$task');");
}

		if($_POST['name'] != ""){
			$name = $_POST['name'];
			$conn->query("INSERT INTO `task` VALUES('', '$name', ''");

		}
		if($_POST['email'] != ""){
			$email = $_POST['email'];
			$conn->query("INSERT INTO `task` VALUES('', '$email', ''");

		}
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			$conn->query("INSERT INTO `task` VALUES('', '$task', ''");

		}

-->