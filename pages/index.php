<?php require '../php/includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/indexphp.css">
  <link rel="stylesheet" href="../styles/news.css">
  <title><?php echo $config['title']; ?></title>
</head>
<body>
  <?php

    include "../php/includes/menu.php";
  ?>
  <a href="login.php">Вход</a><br>
  <a href="signup.php">Регистрация</a>

  <?php if(isset($_SESSION['logged_user'])): ?>
      <a href="logout.php">exit</a>

  <?php
    require('../php/includes/connect.php');

    if (isset($_POST['username']) && isset($_POST['password1'])){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password_1 = $_POST['password1'];
      $password_2 = $_POST['password2'];

      $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_1') ";
      $result = mysqli_query($connection, $query);

      if($result){
        $smsg = "Регистрация прошла успешно";
      } else{
        $fmsg = "Ошибка регистрации";
      }
    }
  ?>
  <?php endif; ?>



  <div class = "container">
    <div class = "news-table">
      <div class = "first-col">
        <div id = "main-news">Самая большая новость</div>
        <div class = "mini-news">mini</div>

      </div>
      <div id = "second-col">
        <div class = "mini-news">mini</div>
        <div class = "mini-news">mini</div>
        <div class = "mini-news">mini</div>
      </div>
      <aside id = "pop-news">

        <!--Самые просматриваемые новости в колонке до 10 новостей -->
      </aside>

    </div>

    <form method="POST" class="form-signin">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="text" name="password1" class="form-control" placeholder="Password" required>
      <input type="text" name="password2" class="form-control" placeholder="Repeat password" required>
      <button class="btn btn-lg primary btn-block" type="submit">Register</button>
    </form>
  </div>
</body>
</html>