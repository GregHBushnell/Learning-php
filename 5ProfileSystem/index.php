<?php
	session_start();
	include 'loginlogoutregister.php';
	//connecting to database
	$link = mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['Login_Btn'])){
		login($link);
	}
	if(isset($_POST['Register_Btn'])){
		register($link);
	}
	if(isset($_POST['Logout_Btn'])){
		logout($link);
	}
?>
<script>
	function toggleDiv(divId) {
		$("#"+divId).toggle(300);
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<Title>LogIn</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
</head>
<body>
<div class="header"> 
	<h1>Website</h1>
	<div><h4>
	<?php 
		if(isset($_SESSION['username']) ){
			echo "Welcome ".$_SESSION['username'];
			
		}else{
			echo "Logged Out ";
		}
	?>
	</h4></div>
</div>
<div class = "loginBox">
	<form method = "post" action="index.php">
		<table>
			<ul>
				<li><label for="usermail"></label>
					<input type="text" name="username" placeholder="username"  class = "TextInput"></li>
				<li><label for="password"></label>
					<input type="password" name="password" placeholder="password"  class = "TextInput"></li>
					<?php
						if(isset($_SESSION['message'])){
							echo"<div id='error_msg'>".$_SESSION['message']."</div>";
							unset($_SESSION['message']);
						}
					?>
				<li>
					<div class = "Buttons">
					<input type ="submit" name = "Login_Btn" value ="Login">
					<a href="javascript:toggleDiv('RegisterBox');"><button type="button">Register</button></a>
					<input type ="submit" name = "Logout_Btn" value ="LogOut" href="logout.php">
					</div>
				</li>
			</ul>
		</table>
	</form>
<div id = "RegisterBox">
	<form method = "post" action="index.php" enctype="multipart/form-data">
		<table>
			<ul>
				<li><label for="usermail"></label>
					<input type="text" name="username" placeholder="username"  class = "TextInput"></li>
				<li><label for="email"></label>
					<input type="email" name="email" placeholder="email"  class = "TextInput"></li>
				<li>
					<input type="password" name="password" placeholder="password"  class = "TextInput"></li>
				<li>
					<input type="password" name="password2" placeholder="Reenter Password"  class = "TextInput"></li>
				<li>
					<input type="file" name="image" size="25" />
					<input type ="submit" name = "Register_Btn" value ="Register">
				</li>
			</ul>
		</table>
	</form>
</div>
</div>
</body>
</html>