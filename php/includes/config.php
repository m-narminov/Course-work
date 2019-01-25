<?php
  $config = array(
    'title' => 'Geeking.ru',
    'db' => array(
      'server' => 'loclahost',
      'username' => 'root',
      'password' => '',
      'name' => 'geeking'
    )
  );

  $link = mysqli_connect('localhost','root','', 'geeking');
  mysqli_set_charset($link, "utf8");

  $sgv_path = 'res/img/svg/';
  $categories = array($sgv_path.'last.svg',
                      $sgv_path.'games.svg',
                      $sgv_path.'movies.svg',
                      $sgv_path.'comix.svg',
                      $sgv_path.'tech.svg',
                      $sgv_path.'sport.svg');

  //запрос списка категорий
  $sql_cat = "SELECT * FROM categories WHERE category_id <> 5 and category_id <> 6";
  $sql_all_cat = "SELECT * FROM categories";
  $all_cats = mysqli_query($link, $sql_all_cat);
  $all_categs = array();
  while ($all_categs[] = mysqli_fetch_assoc($all_cats)) {}
  unset($all_categs[7]);
  $cat_stat = mysqli_query($link, $sql_cat);
?>