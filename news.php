<?php	require_once 'php/includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styles/news.css">
	<link rel="stylesheet" href="styles/index.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<script src="js/scrollUp.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script async src="//www.instagram.com/embed.js"></script>
	<title>Новости</title>
</head>
<body>
	<?php require_once 'php/includes/menu.php';
		if (!isset($_GET['article_id'])) {
			die();
		}
		$art_id = $_GET['article_id'];
		$full_article = mysqli_query($link, "SELECT * FROM articles WHERE article_id = $art_id");
		$art = mysqli_fetch_assoc($full_article);
	?>
	<div class="container">
		<div id="article-header" style="background-image: url('<?php echo $art['article_img']; ?>');">
			<div class="category"><?php	echo $all_categs[$art['category_id']-1]['cat_name']; ?></div>
			<div class="article-title"><?php echo $art['title']; ?></div>
			<div class="article-info">
				<div class="article-time"><?php echo $art['published']; ?></div>
				<div class="article-author"><?php echo $art['author']; ?></div>
			</div>
		</div>
		<main>
			<?php	echo $art['content']; ?>
			<!-- Trigger the Modal
			<img id="myImg" src="../resources/imgs/star_wars.jpg" alt="Snow" style="width:100%;max-width:300px">-->
			<!-- The Modal
			<div id="myModal" class="modal">

				 The Close Button
				<span class="close">&times;</span>

				 Modal Content (The Image)
				<img class="modal-content" id="img01">

			  Modal Caption (Image Text)
				<div id="caption"></div>
			</div> -->
		</main>
	</div>
	<?php	require_once 'php/includes/footer.php'; ?>
</body>
</html>