<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','hellodb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users (firstName, lastName, email, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName,  $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>