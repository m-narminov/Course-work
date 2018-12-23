
<div id="menu" class="sticky">
		<!--Вставить лого сайта
			и переключатель ночного режима-->
	<a id="logo" href="index.php">
		<!--<img src="../resources/imgs/logo.png" alt="" srcset="">-->
	</a>

	<a href="games.php"><?php echo "Игры" ?></a>
	<a href="cinema.php"><?php echo "Кино и сериалы" ?></a>
	<a href="books.php"><?php echo "Комиксы и книги" ?></a>
	<a href="tech.php"><?php echo "Технологии" ?></a>
	<a href="internet.php"><?php echo "Интернет" ?></a>
	<a href="music.php"><?php echo "Музыка" ?></a>
	<a href="cyber.php"><?php echo "Киберспорт" ?></a>
	<a href="login.php">
		<?php
		echo "Вход" ?>
	</a>
</div>

<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		/*var img = document.getElementById('myImg');
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
		img.onclick = function () {
			modal.style.display = "block";
			modalImg.src = this.src;
			captionText.innerHTML = this.alt;
		}*/

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function () {
			modal.style.display = "none";
		}
	</script>