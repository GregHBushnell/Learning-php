<?php
	function logout(){
		session_destroy();
		unset($_SESSION['username']);
		$_SESSION['message'] = "You are now logged out";
		header("location: index.php");
	}
	function login($link){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username']= $username;
			retrivePicture($link);
			header("location: index.php");
		}else{
			$_SESSION['message'] = "Incorrect";
		}
	}
	function register($link){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$password2 = mysqli_real_escape_string($link, $_POST['password2']);
		if($password == $password2){
			if ($_FILES['image']['error'] == UPLOAD_ERR_OK){
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
				$image_name = addslashes($_FILES['image']['name']);
			}else{
				echo'No File Chosen';
			}	
			$password= md5($password);
			$sql = "INSERT INTO users(UserName,email,password,ImageName,ProfilePicture)VALUES('$username','$email','$password','$image_name','$image')";
			mysqli_query($link,$sql);
			$_SESSION['message'] = "You are now registered";
			$_SESSION['username'] = $username;
		}else{
			$_SESSION['message'] = "Passwords do not match";
		}
	}
	function retrivePicture($link){
		
	}
?>