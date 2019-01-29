<div id="menu" class="sticky">
	<!--Вставить лого сайта
		и переключатель ночного режима-->

	<div id="logo">
		<a href="/Course-work/index.php">
			<img src="/Course-work/res/img/logo-g.png" alt="" srcset="">
		</a></div>
	<?php
		foreach ($all_categs as $category) {
			echo '<a href="/Course-work/cat.php?cat_id='.$category['category_id'].'">'.$category['cat_name'].'</a>';
		}
	?>
</div>
<div class="voidm">
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
