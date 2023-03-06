<?php
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
// Set the database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelm";
	
require 'DB.php';

	// Database connection
  
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Guest(Gname, Address, Phone) values(?, ?, ?)");
		$stmt->bind_param("ssi", $name, $address, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Guest details entered successfully...";
		$stmt->close();
		$conn->close();
	}
?>
