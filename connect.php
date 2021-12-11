<?php
	$fullName = $_POST['fullName'];
	$userName = $_POST['username'];
	$emailAddres = $_POST['emailAddres'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$phoneNumbrt= $_POST['phoneNumber']

	// Database connection
	$conn = new mysqli('github','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullName, userName,emailAddres,password,confirmPassword,phoneNumber)
         values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullName, $userName, $emailAddres, $password, $confirmPassword, $phoneNumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>