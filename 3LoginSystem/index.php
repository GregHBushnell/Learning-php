<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<Title>HomePage</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
	<div class="header"> 
	<h1>Home Page</h1>
	</div>
	<?php
		if(isset($_SESSION['message'])){
			echo"<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
	?>
	<div class="Content"> 
	<div><h4>Welcome <?php echo $_SESSION['username'];?></h4></div>
	<div><a href="logout.php">LogOut</a></div>
	</div>
</body>
</html>