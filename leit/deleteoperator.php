<?php
session_start();


	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "cyberethics";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
   mysqli_set_charset($conn, "utf8");
    //prepare the query
	$sql = "DELETE FROM operator WHERE username='$_POST[userdelete]'";
   
 // echo $_POST["userdelete"];


    //execute the query
	if(    $conn->query($sql)  ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Ο λειτουργός διαγράφτηκε επιτυχώς')
            window.location.href='/leit/operatorop.php';
            </SCRIPT>");
	}
	else {
    	echo "Error deleting record: " . $conn->error;
	}
	
    // connection closing
	$conn->close();


// else 
// echo "Problem has Occured"; 


?>