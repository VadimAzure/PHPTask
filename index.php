<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark box-shadow">
		<div class="container">
			<a class="navbar-brand" href="/">Задачник</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbar">
				<form class="form-inline my-2 my-lg-0" action="login.php" method="post">
					<?php if (!isset($_SESSION['login'])) {?>
					<input class="form-control mr-sm-2" type="text" name="login" placeholder="Логин" />
					<input class="form-control mr-sm-2" type="text" name="password" placeholder="Пароль" />
					<button class="btn btn-outline-success mr-sm-2" name="submit" type="submit">Войти</button>
					<?php } else if (isset($_SESSION['login'])) { ?>
					<a href="logout.php" class="btn btn-outline-success mr-sm-2">Выйти</a>
					<?php } ?>
				</form>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-md-12 mt-3">
			<?php if (isset($_SESSION['login'])) {?>
			<h3 class="text-primary">Добро пожаловать, <?=$_SESSION['login']?> !</h3>
			<?php } else {?>
			<h3 class="text-primary">Добро пожаловать!!</h3>
			<?php } ?>
			<hr style="border-top:1px dotted #ccc;"/>
			<div class="col-md-10">
					<form class="form-inline" id="taskForm" action="add_task.php" method="post">
						<input type="text" class="form-control mr-sm-2" name="name" id="name"/>
						<span class="form_error">Пожалуйста введите имя</span>
						<input type="text" class="form-control mr-sm-2" name="email" id="email"/>
						<span class="form_error">Пожалуйста введите email</span>
						<span class="form_error" id="invalid_email">Неправильный формат email</span>
						<input type="text" class="form-control mr-sm-2" name="task" id="task"/>
						<span class="form_error">Пожалуйста введите задачу</span>
						<button class="btn btn-primary form-control" id="submit" name="add">Создать задачу</button>
					</form>
			</div>
			<br /><br /><br />
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Имя пользователя</th>
						<th>E-Mail</th>
						<th>Задачи</th>
						<th>Статус</th>
						<?php if (isset($_SESSION['login'])) {?>
						<th></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$conn = new mysqli("localhost", "root", "", "task_test");
						$conn->set_charset("utf8");
						if(!$conn){
							die("Error: Cannot connect to the database");
						}

						$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
						$count = 1;
						while($fetch = $query->fetch_array()){
					?>
					<tr>
						<td><?php echo $count++?></td>
						<td><?php echo $fetch['name']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['task']?></td>
						<td><?php echo $fetch['status']?></td>
						<?php if (isset($_SESSION['login'])) {?>
							<td colspan="2">
									<?php
										if($fetch['status'] != "Выполнено"){
											echo 
											'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="">Выполнено</span></a> |';
										}
									?>
									<a href="delete_task.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="">Удалить</span></a>
							</td>
						<?php } ?>
					</tr>
					<?php
						}
					?>
					
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('.form_error').hide();
      $('#submit').click(function(){
           var name = $('#name').val();
           var email = $('#email').val();
           var task = $('#task').val();
           if(name== ''){
              $('#name').next().show();
              return false;
            }
            if(email== ''){
               $('#email').next().show();
               return false;
            }
            if(IsEmail(email)==false){
                $('#invalid_email').show();
                return false;
            }
            if(task== ''){
                $('#task').next().show();
                return false;
            }
          });
      });
      function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
  </script>

</body>
</html>