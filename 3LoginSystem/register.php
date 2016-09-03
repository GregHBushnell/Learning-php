<?php
	session_start();
	
	//connecting to database
	$link = mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['Register_Btn'])){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$password2 = mysqli_real_escape_string($link, $_POST['password2']);
		if($password == $password2){
			$password= md5($password);
			$sql = "INSERT INTO users(UserName,email,password)VALUES('$username','$email','$password')";
			mysqli_query($link,$sql);
			$_SESSION['message'] = "You are now registered";
			$_SESSION['username'] = $username;
			header("location: index.php");
		}else{
			$_SESSION['message'] = "Passwords do not match";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<Title>Registation</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
<div class="header"> 
	<h1>Registraton</h1>
</div>
	<?php
		if(isset($_SESSION['message'])){
			echo"<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
	?>
<form method = "post" action="register.php">
<table>
	<tr>
		<td>UserName:</td>
		<td><input type ="text" name = "username" class = "TextInput"></td>
	</tr>
	<tr>
		<td>Email Address:</td>
		<td><input type ="email" name = "email" class = "TextInput"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type ="password" name = "password" class = "TextInput"></td>
	</tr>
	<tr>
		<td>Confrim Password:</td>
		<td><input type ="password" name = "password2" class = "TextInput"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type ="submit" name = "Register_Btn" value ="Register"></td>
	</tr>
</table>
</form>
</body>
</html>