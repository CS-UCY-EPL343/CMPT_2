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


$sql = "DELETE FROM helplinecomplaint WHERE id=$_SESSION[helpdel]";

if ($conn->query($sql) === TRUE) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Complaint Deleted Successfully')
            window.location.href='/leit/desp.php';
            </SCRIPT>");




} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();











}



else 
echo "Problem has Occured"; 


?>