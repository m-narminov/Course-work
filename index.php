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
  <?php require_once 'php/includes/menu.php';
    //require_once 'php/includes/connect.php';

    //регистрация пользователей
    if (isset($_POST['username']) && isset($_POST['password1'])) {
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
      $sql_last_news = "SELECT article_id,
                               title,
                               category_id,
                               views,
                               published,
                               article_img
                        FROM articles ORDER BY published DESC LIMIT 26";
      $sql_status = mysqli_query($link, $sql_last_news);

      if (!$sql_status) {
        echo '<br>Не получилось вывести статьи<br>';
      }
      //запрос списка категорий
      //$sql_cat = "SELECT * FROM categories";
      //$cat_stat = mysqli_query($link, $sql_cat);

      while($categs[] = mysqli_fetch_array($cat_stat)) {};

    ?>
  <div id = "container">
    <div id = "news-table">
      <div id = "first-col">
        <?php $article = mysqli_fetch_assoc($sql_status); ?>
        <div id = "main-news" style="background-image: url(<?php echo $article['article_img']; ?>);f">
          <?php echo '<a href="cat.php?cat_id='.$article['category_id'].'" class="news-category">'.$categs[$article['category_id']]['cat_name']. '</a>
            <a href="news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
        </div>
        <?php $article = mysqli_fetch_assoc($sql_status); ?>
        <div class = "mini-news" style="background-image: url(res/img/spiderjpg.jpg);">
          <?php echo '<a href="cat.php?cat_id='.$article['category_id'].'" class="news-category">'.$categs[$article['category_id']]['cat_name']. '</a>
            <a href="news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
          </a>
        </div>
      </div>
      <div id = "second-col">
        <?php $article = mysqli_fetch_assoc($sql_status); ?>
        <div class = "mini-news" style="background-image: url(res/img/game.jpg);">
        <?php echo '<a href="cat.php?cat_id='.$article['category_id'].'" class="news-category">'.$categs[$article['category_id']]['cat_name']. '</a>
            <a href="news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
          </a>
        </div>
        <?php $article = mysqli_fetch_assoc($sql_status); ?>
        <div class = "mini-news" style="background-image: url(res/img/afro.jpg);">
        <?php echo '<a href="cat.php?cat_id='.$article['category_id'].'" class="news-category">'.$categs[$article['category_id']]['cat_name']. '</a>
            <a href="news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
        </div>
        <?php $article = mysqli_fetch_assoc($sql_status); ?>
        <div class = "mini-news" style="background-image: url(res/img/football.jpg);">
        <?php echo '<a href="cat.php?cat_id='.$article['category_id'].'" class="news-category">'.$categs[$article['category_id']]['cat_name']. '</a>
            <a href="news.php?article_id=' .$article['article_id']. '" class="news-title">' .$article['title']. '</a>'; ?>
        </div>
      </div>
      <div id = "pop-news">
        Новости
        <div class="news-list">
          <?php
            for ($i = 0; $i < 15; $i++) {
              $article = mysqli_fetch_assoc($sql_status);
              echo '<div class="news-list-i"><div>'.$article['published'].'</div>
                    <a href="news.php?article_id='.$article['article_id'].'">'.$article['title'].'</a></div>';
            }
          ?>
        </div>
      </div>
    </div>

    <?php
      $svg_cat_count = count($categories);
      //Запрос выбора новостей по категориям
      echo '<div class="news-flex"><p class="news-category-big"><span class="svg"><img src="'.$categories[0].'" alt="" srcset=""></span>Последние</p>';
      //вывод последних новостей
        for ($i = 0; $i < 6; $i++) {
          if ($article = mysqli_fetch_assoc($sql_status)){

            echo '<div class="flex-cells"><img src="'.$article['article_img'].'" alt="" srcset="">
                  <a href="cat.php?cat_id='.($article['category_id']-1).'" class="flex-caption news-category">'.$all_categs[$article['category_id']]['cat_name'].'</a>
                  <a href="news.php?article_id='.$article['article_id'].'">'.$article['title'].'</a></div>';
          } else break;
        }
      echo '</div>';

      $sql_cat_news = "SELECT article_id,
                              title,
                              category_id,
                              views,
                              published,
                              article_img FROM articles ORDER BY category_id ASC, published DESC LIMIT 30";

      $articles = mysqli_query($link, $sql_cat_news);
      //новости по категориям
      for ($i = 1; $i < $svg_cat_count; $i++) {

        //if ($categories[$i] != NULL){
        echo '<div class="news-flex"><p class="news-category-big"><span class="svg">
                <img src="'.$categories[$i].'" alt="svg" srcset=""></span>'.$categs[$i-1]['cat_name'].'</p>';

        //вывод новостей из категории
        for ($j = 0; $j < 6; $j++) {
          $article = mysqli_fetch_assoc($articles);
          echo '<div class="flex-cells"><img src="'.$article['article_img'].'" alt="" srcset="">
                  <a href="cat.php?cat_id='.$categs[$i-1]['category_id'].'" class="flex-caption  news-category">'.$categs[$i-1]['cat_name'].'</a>
                  <a href="news.php?article_id='.$article['article_id'].'">'.$article['title'].'</a></div>';
        }
        //}
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