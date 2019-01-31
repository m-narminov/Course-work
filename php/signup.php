<?php
	session_start();
	require 'includes/config.php';
?>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/index.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/scrollUp.js"></script>
  <title><?php echo $config['title']; ?></title>
</head>
<body>
	<?php 
		require_once 'includes/menu.php';
	?>
	<div class="wrapper">
		<div class="cont">
		
		<?php
		
		$login=$_POST['login']; 
		$password=$_POST['password']; 
		$email = $_POST['email'];
		
		$result = mysqli_query($link,"SELECT * FROM users WHERE email='".$email."'");
		$data = mysqli_fetch_array($result);
		
		if ($data){
			echo "Пользователь с таким email уже существует.";
		}
		else {
			$result = mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
			$data = mysqli_fetch_array($result);
			if ($data){
				echo "Пользователь с таким логином уже существует.";
			}
			else {
				$query="INSERT INTO users (id,login,email,password) VALUES ('','".$login."','".$email."','".$password."')";
				$result = mysqli_query($link,$query);
				if ($result) echo "Регистрация прошла успешно!";
			}
		}
		
		echo '<br>Вы будете перенаправлены на главную страницу через 10 секунд.<br>';
		header('Refresh: 10; url=/Course-work/index.php');
		?>
		</div>
	<?php
	include 'includes/footer.php'; 
	?>
	</div>
</body>
</html>
