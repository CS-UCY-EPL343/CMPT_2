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

    $action=$_POST["action"];
    $id=  $_SESSION["id"];
 
    $sql = "SELECT  actionstaken FROM helplinecomplaint where id= $id";
    $result = $conn->query($sql);


     // output data of each row
     $row = $result->fetch_assoc();
     $pastaction=$row["actionstaken"];
 $newline='\n';
 $user=$_SESSION["user"].": ";

     $newAction= $pastaction.$newline.$user.$action;
   

    //prepare the moving query
    $sql = "UPDATE helplinecomplaint SET actionstaken='$newAction'  where id=$id";






    //execute the query
	if(   ($conn->query($sql) === TRUE)     ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Οι ενεργειες προσθετηκαν')
            window.location.href='/leit/desp.php';
            </SCRIPT>");
	}
	else {
    	echo "Error deleting record: " . $conn->error;
	}
	
    //connection closing
	$conn->close();


 


?>