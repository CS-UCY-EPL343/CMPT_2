<!DOCTYPE html>
<html>
<body>

<?php

// include 'showHLDetails.php';

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

$sql = "SELECT id, name, DateTime FROM hotlinecomplaint where id=1";
$result = $conn->query($sql);


     // output data of each row
     $row = $result->fetch_assoc();
         echo  $row["DateTime"];
     
 

// echo ("<SCRIPT LANGUAGE='JavaScript'>
//             $('input[type=text].platname').val('ael');
//             </SCRIPT>");

 $conn->close();

	   
?>  



</body>
</html>