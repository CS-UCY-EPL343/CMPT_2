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

$sql = "SELECT  name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,DateTime FROM helplinecomplaint where id= $_SESSION[helpdel]";

$result = $conn->query($sql);


     // output data of each row
     $row = $result->fetch_assoc();
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



$sql = "INSERT INTO HotLineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values ('$name','$surname','$email','$age','$sex','$complaintFor','$WebsiteName','$platformname','$typeofcomplaint','$details','$dateTime')";
    
$sqll = "DELETE FROM helplinecomplaint WHERE id=$_SESSION[helpdel]";

if ( ($conn->query($sql) === TRUE) &&  ($conn->query($sqll) === TRUE)  ) {
    

echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Complaint Removed Successfully')
            window.location.href='/leit/desp.php';
            </SCRIPT>");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




}
else{



echo "ael";


}






?>