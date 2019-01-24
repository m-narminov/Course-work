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
  //require "db.php";
  mysqli_set_charset($link, "utf-8");

  $sgv_path = 'res/img/svg/';
  $categories = array($sgv_path.'last.svg',
                      $sgv_path.'games.svg',
                      $sgv_path.'movies.svg',
                      $sgv_path.'comix.svg',
                      $sgv_path.'tech.svg',
                      $sgv_path.'sport.svg');

  //запрос списка категорий
  $sql_cat = "SELECT * FROM categories";
  $cat_stat = mysqli_query($link, $sql_cat);
  $cat_arr = mysqli_fetch_

?>