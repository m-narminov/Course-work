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
  require "db.php";
  $categories = array();

?>