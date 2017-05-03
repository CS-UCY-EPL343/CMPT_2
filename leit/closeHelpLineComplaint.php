<?php
session_start();

//DELETE AA HELP LINE COMPLAINT FROM THE DATA BASE

//check if the sesion of id is ok
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
	 mysqli_set_charset($conn, "utf8");
    
    //prepaare the query
	$sql = "DELETE FROM helplinecomplaint WHERE id=$_SESSION[helpdel]";


$sql1 = "SELECT  ID,name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,DateTime,actionstaken,sentfrom FROM helplinecomplaint where id= $_SESSION[helpdel]";
    //execute the query
    $result = $conn->query($sql1);

    // output data of each row
    $row = $result->fetch_assoc();
    $iid=$row["ID"];
    $name=  $row["name"];
    $surname=  $row["surname"];
    $email= $row["email"];
    $age= $row["age"];
    $sex= $row["sex"];
    $WebsiteName=$row["WebsiteName"];
    $complaintFor=$row["complaintFor"];
    $platformname=$row["platformname"];
    $typeofcomplaint=$row["typeofcomplaint"];
    $details=$row["details"];
    $dateTime=$row["DateTime"];
    $action=$row["actionstaken"];
    $sentfrom=$row["sentfrom"];
    //prepare the moving query
    $sql1 = "INSERT INTO closedHelpLine(ID,Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime,actionstaken,Datetimeclosed,sended) Values ('$iid','$name','$surname','$email','$age','$sex','$complaintFor','$WebsiteName','$platformname','$typeofcomplaint','$details','$dateTime','$action',NOW(),'$sentfrom')";




    //execute the query
	if(   ($conn->query($sql1) === TRUE)  &&  ($conn->query($sql) === TRUE)    ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
         	window.alert('Η καταγγελία ολοκληρώθηκε!')
            window.location.href='/leit/desp.php';
            </SCRIPT>");
	} 
	else {
    	echo "Error deleting record: " . $conn->error;
	}
    //closing the connection
	$conn->close();
}

else{ 
	echo "Problem has Occured"; 
}

?>