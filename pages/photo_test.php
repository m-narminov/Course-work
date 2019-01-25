<?php
	/***
	* All of the below MySQL_ commands can be easily
	* translated to MySQLi_ with the additions as commented
	***/

	if($_POST['submit']){
		$link =  mysqli_connect("localhost", "root", "", "geeking");
		$filename = $_FILES['image']['name'];
		echo $filename;
	
		if(mysqli_connect_errno()) {
			$imgData = file_get_contents($filename);
			$size = getimagesize($filename);
			// mysqli
			// $link = mysqli_connect("localhost", $username, $password,$dbname);
			$sql = sprintf(
				"INSERT INTO testblob (image_type, image, image_size, image_name)
				VALUES ('%s', '%s', '%d', '%s')",
				/***
				* For all mysqli_ functions below, the syntax is:
				* mysqli_whartever($link, $functionContents);
				***/	
				mysqli_real_escape_string($link, $size['mime']),
				mysqli_real_escape_string($link, $imgData),
				$size[3],
				mysqli_real_escape_string($link, $_FILES['image']['name'][0])
			);	
			mysqli_query($link, $sql);
		}	
	}
  
	mysqli_select_db($link, "geeking");
	$sql = "SELECT image FROM testblob WHERE image_id=1";
	$result = mysqli_query($link, $sql);
	header("Content-type: image/jpeg");
	echo mysqli_fetch_assoc($result);  //mysql_result($result, 0);
	mysqli_close($link);

?>