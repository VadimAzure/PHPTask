

<?php
	require_once 'core.php';

	$username = $_POST['login'];
	$password = $_POST['password'];
 
	$query = mysqli_query($conn, "SELECT * FROM `login` WHERE `login` = '$username' AND `password` = '$password'") or die(mysqli_error());
	$row = mysqli_num_rows($query);
 
	if($row > 0){
        $_SESSION['logTrue'] = TRUE;
        $_SESSION['login'] = $_POST['login'];
        //echo 'Вы вошли в систему ' . $_SESSION['login'] . '! <a href="index.php">Вернуться</a>';
        header('location:index.php');
        
	}else{
		echo "error";
	}

?>
