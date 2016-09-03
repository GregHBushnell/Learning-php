<html>
<head>

</head>
<body>
	<p>Hello world in Html</p>
<?php
	echo "Hello World in php"."<br>"; 
	
	$FirstName = "Greg";
	echo "First Name = ".$FirstName."<br>";
	$LastName = "Bushnell";
	echo "Last Name = ".$LastName."<br>";
	$FullName = $FirstName." ".$LastName;
	echo "Full Name = ".$FullName."<br>";
	
	echo "<br>";
	$FirstInt = 1;
	echo "php int One = ".$FirstInt."<br>";
	$SecondInt = 2;
	echo "php int Two = ".$SecondInt."<br>";
	$ThirdInt = $FirstInt + $SecondInt;
	echo "php int One + Two = ".$ThirdInt."<br>";
	
	echo "<br>";
	$arrayStrings = array("elementOne","elementTwo","elementThree");
	foreach($arrayStrings as $element){
		echo $element." ";
	}
	
	echo "<br>";
	$arrayNumbers = array(1,2,3);
	$sum = 0;
	foreach($arrayNumbers as $number){
		$sum = $sum + $number;
	}
	echo $sum;
?>
</body>
</html>