<?php

	$data = $_POST;
	if (isset($data['do_signup'])){
		$errors = array();

		if (R::count('users', "login = ?", array($data['login'])) > 0 ){
			$errors[] = "Пользователь с таким логином уже существует";
		}

		if (R::count('users', "email = ?", array($data['email'])) > 0 ){
			$errors[] = "Пользователь с таким email уже существует";
		}

		if ($data['pass1'] != $data['pass2']){
			$errors[] = "Пароли не совпадают!";
		}

		if (empty($errors)){
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['pass1'], PASSWORD_DEFAULT);
			R::store($user);
			echo "<div style='color: green;'>Регистрация прошла успешно</div>";

		} else {
			echo "<div style='color: red;'>".array_shift($errors)."</div><hr>";
		}
		$_POST[] = "";
	}
?>

<form action="signup.php" method="post">
	<p>Ваш логин: </p>
	<p><input type="text" name="login" required></p>
	<p>Ваша почта: </p>
	<p><input type="email" name="email" required></p>
	<p>Придумайте пароль: </p>
	<p><input type="password" name="pass1" required></p>
	<p>Проверим пароль: </p>
	<p><input type="password" name="pass2" required></p>
	<button type="submit" name="do_signup">Регистрация</button>
</form>