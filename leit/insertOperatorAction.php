<?php
session_start();


	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "cyberethics";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
     mysqli_set_charset($conn, "utf8");

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
 //   mysqli_set_charset($conn, "utf8");
 //    //prepare the query
	// $sql = "DELETE FROM reportedhotLine WHERE id=$_SESSION[helpdel]";
 //     $sql1 = "SELECT  ID,name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,DateTime FROM reportedhotLine where id= $_SESSION[helpdel]";
 //    //execute the query
 //    $result = $conn->query($sql1);

    // output data of each row
    // $row = $result->fetch_assoc();
    $username=$_POST["uname"];
    $password=  $_POST["pword"];
        $rolee=  $_POST["role"];
    if (strcasecmp($rolee, 'helpline') == 0){
        $role='p';
    }
    else if(strcasecmp($rolee, 'hotline') == 0){
               $role='t';

    }
    else
        $role=  $rolee;
    // $surname=  $row["surname"];
    // $email= $row["email"];
    // $age= $row["age"];
    // $sex= $row["sex"];
    // $WebsiteName=$row["WebsiteName"];
    // $complaintFor=$row["complaintFor"];
    // $platformname=$row["platformname"];
    // $typeofcomplaint=$row["typeofcomplaint"];
    // $details=$row["details"];
    // $dateTime=$row["DateTime"];
    
    //prepare the moving query
    $sql = "INSERT INTO operator(username,password,role) Values ('$username','$password','$role')";






    //execute the query
	if(   ($conn->query($sql) === TRUE)     ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Ο λειτουργός προσθέθηκε επιτυχώς')
           history.go(-2)
            </SCRIPT>");
	}
	else {
    	echo "Error deleting record: " . $conn->error;
	}
	
    //connection closing
	$conn->close();


 


?>