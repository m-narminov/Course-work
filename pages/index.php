<?php require '../php/includes/config.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/index.css">
  <title><?php echo $config['title']; ?></title>
</head>
<body>
  <?php

    include "../php/includes/menu.php";

    if(isset($_SESSION['logged_user'])): ?>
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

      if($result) {
        $smsg = "Регистрация прошла успешно";
      } else {
        $fmsg = "Ошибка регистрации";
      }
    }
    endif;
  ?>

  <div id = "container">
    <div id = "news-table">
      <div id = "first-col">
        <div id = "main-news" style="background-image: url(../resources/imgs/aquaMan.jpg);">
          <span ></span>
          <div class="news-category">Кино и сериалы</div>
          <div class="news-title">37 неудобных вопросов к &laquo;Аквамену&raquo;</div>
        </div>
        <div class = "mini-news" style="background-image: url(../resources/imgs/spiderjpg.jpg);">
          <div class="news-category">Интернет</div>
          <div class="news-title">
            Что такое &laquo;Паукогеддон&raquo;?
          </div>
        </div>
      </div>
      <div id = "second-col">
        <div class = "mini-news" style="background-image: url(../resources/imgs/game.jpg);">
          <div class="news-category">Игры</div>
          <div class="news-title">
            30 главных игр 2018. Краткий обзор Soulcalibur VI
          </div>
        </div>
        <div class = "mini-news" style="background-image: url(../resources/imgs/afro.jpg);">
          <div class="news-category">Кино и сериалы</div>
          <div class="news-title">
            30 главных фильмов и сериалов 2018. "Люк Кейдж"
          </div>
        </div>
        <div class = "mini-news" style="background-image: url(../resources/imgs/football.jpg);">
          <div class="news-category">Кино и сериалы</div>
          <div class="news-title">
          Лучшие мемы 2018: Дока 2, Илон Маск,
            Чемпионат мира и мышь, которая (кродется)
          </div>
        </div>
      </div>
      <div id = "pop-news">
        Новости
        <div class="news-list">
          <?php
            /*
              вывести каждую новость в блоке
              с сылкой на категорию
              и ссылкой в форме заголовка статьи
            */

          ?>

          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
          <div class="news-list-i">
            <div>time</div> <a href="">article 1</a>
          </div>
        </div>
      </div>

    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>
    <div class="news-grid">
      <p class="news-category-big"></p>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
      <div class="grid-cells"></div>
    </div>

    <form method="POST" class="form-signin">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="text" name="password1" class="form-control" placeholder="Password" required>
      <input type="text" name="password2" class="form-control" placeholder="Repeat password" required>
      <button class="btn btn-lg primary btn-block" type="submit">Register</button>
    </form>
  </div>
  <script>
    function fullImage(){
      target = document.getElementById('news-table');


    }
  </script>
</body>
</html>