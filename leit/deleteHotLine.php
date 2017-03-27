<?php
session_start();

if (isset($_SESSION['helpdel'])){
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

    //prepare the query
	$sql = "DELETE FROM hotlinecomplaint WHERE id=$_SESSION[helpdel]";
    
    //execute the query
	if ($conn->query($sql) === TRUE) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Complaint Deleted Successfully')
            window.location.href='/leit/despHotLine.php';
            </SCRIPT>");
	}
	else {
    	echo "Error deleting record: " . $conn->error;
	}
	
    //connection closing
	$conn->close();
}

else 
echo "Problem has Occured"; 


?>