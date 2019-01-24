<?php require_once 'php/includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/index.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/scrollUp.js"></script>
  <title><?php echo $config['title']; ?></title>
</head>
<body>
  <?php require_once 'php/includes/menu.php'; //вставка навигации
    //require_once 'php/includes/connect.php';

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

  ?>
      Тест загрузки картинок
      <form action="photo.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id=""><br>
        <input type="submit" value="Upload">
      </form>
  <?php

      //запрос на выдачу последних 20 новостей
      $sql_last_news = "SELECT * FROM articles ORDER BY published DESC LIMIT 20";
      $sql_status = mysqli_query($link, $sql_last_news);

      if (!$sql_status) {
        echo '<br>Не получилось вывести статьи<br>';

      }

      //запрос списка категорий
      //$sql_cat = "SELECT * FROM categories";
      //$cat_stat = mysqli_query($link, $sql_cat);

      while($categs[] = mysqli_fetch_array($cat_stat)) {};


      $article = mysqli_fetch_assoc($sql_status);

    ?>
  <div id = "container">
    <div id = "news-table">
      <div id = "first-col">
        <div id = "main-news" style="background-image: url(<?php //путь к картинке данной статьи ?>res/img/aquaMan.jpg);">
          <a href="#" class="news-category"><?php echo $categs[$article['category_id']]['cat_name']; ?></a>
          <?php echo '<a href="pages/news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
        </div>
        <div class = "mini-news" style="background-image: url(res/img/spiderjpg.jpg);">
          <a href="#" class="news-category">Интернет</a>
          <a href="#" class="news-title">
            Что такое &laquo;Паукогеддон&raquo;?
          </a>
        </div>
      </div>
      <div id = "second-col">
        <div class = "mini-news" style="background-image: url(res/img/game.jpg);">
          <a href="#" class="news-category">Игры</a>
          <a href="#" class="news-title">
            30 главных игр 2018. Краткий обзор Soulcalibur VI
          </a>
        </div>
        <div class = "mini-news" style="background-image: url(res/img/afro.jpg);">
          <a href="#" class="news-category">Кино и сериалы</a>
          <a href="#" class="news-title">30 главных фильмов и сериалов 2018. "Люк Кейдж"</a>
        </div>
        <div class = "mini-news" style="background-image: url(res/img/football.jpg);">
          <a href="#" class="news-category">Кино и сериалы</a>
          <a href="#" class="news-title">Лучшие мемы 2018: Дока 2, Илон Маск,
            Чемпионат мира и мышь, которая (кродется)</a>
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
            while ($article = mysqli_fetch_assoc($sql_status)) {
              echo '<div class="news-list-i"><div>'.$article['published'].'</div>
                    <a href="pages/news.php?article_id='.$article['article_id'].'">'.$article['title'].'</a>
                    </div>';
            }
          ?>
        </div>
      </div>
    </div>

    <?php
      $cat_count = count($categories);

      //вывод блоков по категорям
      for ($i = 0; $i < $cat_count; $i++) {
        echo '<div class="news-flex">
                <p class="news-category-big"><span class="svg">
                <img src="'.$categories[$i].'" alt="svg" srcset=""></span>Недавние</p>';

        //вывод новостей из категории
        //добавить вывод названий статей, создать ссылки к каждой
        for ($j = 0; $j < 6; $j++) {
          echo '<div class="flex-cells">
                  <img src="'.$article['photo'].'" alt="" srcset="">
                  <a href="cat.php?cat_id='.$categs[$i]['category_id'].'" class="flex-caption  news-category">'.$categs[$i]['cat_name'].'</a>
                  <a href="">Игрок в CS:GO с помощью сложного прыжка показал удобную точку
                    для защиты на карте Mirage</a></div>';
        }
        echo '</div>';
      }
    ?>

    <!-- <form id="form-signin" method="POST" class="form-signin">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="text" name="password1" class="form-control" placeholder="Password" required>
      <input type="text" name="password2" class="form-control" placeholder="Repeat password" required>
      <button class="btn btn-lg primary btn-block" type="submit">Register</button>
    </form> -->

  </div>
  <a id="go-up" href="#"  onclick="top.gotoTop(); return false;"></a>
  <?php include 'php/includes/footer.php'; ?>
  <script>
    function fullImage() {
      target = document.getElementById('news-table');
    }
  </script>
</body>
</html>