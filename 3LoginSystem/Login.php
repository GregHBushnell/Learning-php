<?php
	session_start();
	//connecting to database
	$link = mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['Login_Btn'])){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username']= $username;
			header("location: index.php");
		}else{
			$_SESSION['message'] = "UserName/Password Incorrect";
		}
	}
	if(isset($_POST['Register_Btn'])){
		header("location: register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<Title>LogIn</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
<div class="header"> 
	<h1>Login</h1>
</div>
	<?php
		if(isset($_SESSION['message'])){
			echo"<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
	?>
<form method = "post" action="login.php">
<table>
	<tr>
		<td>UserName:</td>
		<td><input type ="text" name = "username" class = "TextInput"></td>
	</tr>
	<tr>
		<td>Email Address:</td>
		<td><input type ="password" name = "password" class = "TextInput"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type ="submit" name = "Login_Btn" value ="Login"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type ="submit" name = "Register_Btn" value ="Register"></td>
	</tr>
</table>
</form>
</body>
</html>