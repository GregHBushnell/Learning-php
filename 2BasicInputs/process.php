<html>
<head>

</head>
<body>
<?php
	$fName = $_POST["firstName"];
	$lName = $_POST["lastName"];
	echo "hello, ".$fName." ".$lName."</br>";
	
	$fNumber = $_POST["firstNumber"];
	$sNumber = $_POST["secondNumber"];
	$sum = $fNumber + $sNumber;
	echo "First + Second = ".$sum;
?>
</form>
</body>
</html>