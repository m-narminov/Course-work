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
		header('Refresh: 5; url=/Course-work/index.php');
		echo 'Вы будете перенаправлены на главную страницу через 5 секунд.<br>';
		if (isset($_POST['user'])) { 
			$user = $_POST['user']; 
			if ($user == '') { unset($user);} 
		}
		if (isset($_POST['password'])) { 
			$password=$_POST['password']; 
			if ($password =='') { unset($password);} 
		}
		if (empty($user) or empty($password)){
			echo "<br>Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
		}
		else{
			$result = mysqli_query($link,"SELECT * FROM users WHERE email='".$user."'");
			$data = mysqli_fetch_array($result);
			if (empty($data['password'])){
				exit ("<br/>Извините, введённый вами login или пароль неверный!");
			}
			else {
				if ($data['password']== $password){
					$_SESSION['user']=$data['login'];
					$_SESSION['id']=$data['id'];
					echo "<br />Поздравляем! Вы успешно вошли на сайт! <br />";
				}
				else{
					exit ("<br />Извините, введённый вами login или пароль неверный!");
				}
			}
		}
		?>
		</div>
	<?php
	include 'includes/footer.php'; 
	?>
	</div>
</body>
</html>
