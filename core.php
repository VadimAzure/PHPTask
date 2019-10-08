<?php
    $conn = new mysqli("localhost", "root", "", "task_test");
    $conn->set_charset("utf8");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
	session_start();
	
?>

