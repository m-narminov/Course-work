<?php
	require 'includes/config.php';

  $data = $_POST;

  if( isset($data['do_login']) ){
    $errors = array();
    $user = R::findOne('users', "login = ?", array($data['login']));

    if ( $user ){

      if (password_verify($data['password'], $user->password)){
        echo "<div style='color: green;'>Вы вошли</div>";
        $_SESSION['logged_user'] = $user;

      } else {
        $errors[] = "Неверный пароль";
      }

    } else {
      $errors[] = "Пользователь не найден";
    }

    if (!empty($errors)){
      echo "<div style='color: red;'>".array_shift($errors)."</div><hr>";
    }

  }

?>

<form action="login.php" method="post">
  <p>Lогин: </p>
	<p><input type="text" name="login" required></p>
  <p>Пароль: </p>
	<p><input type="password" name="password" required></p>
  <button type="submit" name="do_login">Войти</button>
</form>