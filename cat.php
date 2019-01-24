<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $config['title']; ?></title>
</head>
<body>
  <?php require_once 'php/includes/config.php';
    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];
      $sql_find_news = "SELECT * FROM articles WHERE category_id = $cat_id";
      $news = mysqli_query($link, $sql_find_news);

      echo '<div class="news-flex">';

      while ($art = mysqli_fetch_assoc($news)) {
        echo '<div class="flex-cells">
        <img src="'.$article['photo'].'" alt="" srcset="">
        <a href="cat.php?cat_id='.$categs[$i]['category_id'].'" class="flex-caption  news-category">'.$categs[$i]['cat_name'].'</a>
        <a href="">Игрок в CS:GO с помощью сложного прыжка показал удобную точку
          для защиты на карте Mirage</a></div>';
      }
      echo '</div>';
    }

  ?>
</body>
</html>