<?php	include "../php/includes/config.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../styles/news.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Новости</title>
</head>
<body>
	<?php include "../php/includes/menu.php" ?>

	<div class="container">
		<div id="article-header">
			<div class="category">
				<?php
					//Выодить категорию
				?>
				Кино и сериалы | #Итоги 2018 года
			</div>
			<div class="article-title">
				<?php //вывести заголовок статьи
				?>
				Самые ожидаемые сериалы 2019
			</div>
			<div class="article-info">
				<div class="article-time">08 декабря 2018 года, 19:00</div>
				<div class="article-author">Александр Трофимов</div>
				<?php
				//Вывод даты и автора
				?>

			</div>
		</div>
		<main>
			<?php
			//Вывести содержание статьи
					$full_article;
					$rows;
					if ($_GET['article_id']) {
						$art_id = $_GET['article_id'];
						$full_article = mysqli_query($link, "SELECT * FROM articles WHERE article_id = $art_id");
					} else die();

					var_dump($full_article);
					var_dump($rows = mysqli_fetch_row($full_article))	;
					echo $rows[5];
			?>

			<h2>Больше итогов 2018 года от «Канобу»</h2>
			<p>Кино и сериалы. Главные события 2018: триумф Marvel, крах Star Wars, уход супергероев с Netflix
				Главные события в комиксах Marvel и DC в 2018 году: свадьбы,перемены и уход легенд</p>
			<p>10 лучших аниме 2018</p>
			<p>Лучшие обложки комиксов Marvel и DC 2018 года</p>
			<p>Самые ожидаемые фильмы 2019 года</p>
			<p>Самые ожидаемые сериалы 2019</p>

			<!-- Trigger the Modal -->
			<img id="myImg" src="../resources/imgs/star_wars.jpg" alt="Snow" style="width:100%;max-width:300px">

			<!-- The Modal -->
			<div id="myModal" class="modal">

				<!-- The Close Button -->
				<span class="close">&times;</span>

				<!-- Modal Content (The Image) -->
				<img class="modal-content" id="img01">

				<!-- Modal Caption (Image Text) -->
				<div id="caption"></div>
			</div>

		</main>
	</div>
	<?php
		include "../php/includes/footer.php"
	?>
</body>

</html>