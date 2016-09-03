<?php
	session_start();
	$link = mysqli_connect("localhost","root","","pictureupload");
	if(isset($_POST['submit'])){
		UploadImage($link);
		DisplayImages($link);
	}
	function UploadImage($link){
		$imagename=$_FILES["image"]["name"];
		if ($_FILES['image']['error'] == UPLOAD_ERR_OK){
		$imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
		$insert_image="INSERT INTO images(name,image) VALUES('$imagename','$imagetmp')";
		mysqli_query($link,$insert_image);
		}else{
			echo'No File Chosen';
		}	
	}
	function DisplayImages($link){
		$order="SELECT * FROM images ORDER BY id ASC";
		mysqli_query($link,$order);
		$qry = mysqli_query($link,"select * from images");
		while($row= mysqli_fetch_array($qry)){
		echo $row["name"];
		echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" /height="50" width="50">';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<Title>HomePage</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
<form method="post" enctype="multipart/form-data">
	Your Image: <input type="file" name="image" size="25" />
	<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>