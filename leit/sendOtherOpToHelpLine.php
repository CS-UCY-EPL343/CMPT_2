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
 
    $sql = "SELECT  actionstaken FROM otheroperatorcomplaint where id= $id";
    $result = $conn->query($sql);
     // output data of each row
     $row = $result->fetch_assoc();
     $pastaction=$row["actionstaken"];
    // $sql = "SELECT  actionstaken FROM otheroperatorcomplaint where id= $id";
    // $result = $conn->query($sql);
    //  // output data of each row
    //  $row1 = $result->fetch_assoc();
    //  $pastaction1=$row1["actionstaken"];





     // $newAction= $pastaction.$pastaction1;
   

    //prepare the moving query
    $sql = "UPDATE helplinecomplaint SET actionstaken='$pastaction',sended='r'  where id=$id";






    //execute the query
	if(   ($conn->query($sql) === TRUE)     ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Η καταγγελία στάλθηκε')
            window.location.href='/leit/despOperators.php';
            </SCRIPT>");
	}
	else {
    	echo "Error deleting record: " . $conn->error;
	}

    $sql = "DELETE   FROM otheroperatorcomplaint where id= $id";
    $conn->query($sql);
	
    //connection closing
	$conn->close();


 


?>