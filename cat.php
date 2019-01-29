<?php require_once 'php/includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $config['title']; ?></title>
  <link rel="stylesheet" href="styles/index.css" />
</head>
<body>
  <?php
    require_once 'php/includes/menu.php';

    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];

      $sql_find_news = "SELECT  article_id,
                                title,
                                category_id,
                                views,
                                published,
                                article_img FROM articles WHERE category_id = '$cat_id'";
      $news = mysqli_query($link, $sql_find_news);

      if (!$news) {
        exit("Нет статей");
      }
      echo '<div class="news-flex">';
      while ($art = mysqli_fetch_assoc($news)) {
        echo '<div class="flex-cells"><img src="'.$art['article_img'].'" alt="" srcset="">
        <a href="cat.php?cat_id='.$all_categs[$cat_id-1]['category_id'].'" class="flex-caption  news-category">'.$all_categs[$cat_id-1]['cat_name'].'</a>
        <a href="pages/news.php?article_id='.$art['article_id'].'">'.$art['title'].'</a></div>';
      }
      echo '</div>';
    }

  ?>
</body>
</html>