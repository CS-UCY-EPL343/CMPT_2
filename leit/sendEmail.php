<?php

session_start();

$mess= nl2br("Κωδικός Καταγγελίας: ".$_SESSION["id"]."\nΗμερομηνία και Ώρα Καταγγελίας: ".$_SESSION["datetime"]."\nΚαταγγελία για: ".$_SESSION["complaintFor"]."\nΔιεύθυνση ιστοσελίδας(URL): ".$_SESSION["WebsiteName"]."\nΌνομα Εφαρμογής: "
	.$_SESSION["platformname"]."\nΕίδος Καταγγελίας: ".$_SESSION["typeofcomplaint"]."\nΛεπτομέρειες :".$_SESSION["details"]."\nE-Mail: ".
	$_SESSION["email"]."\nΟνομα: ".$_SESSION["name"]."\nΕπίθετο: ".$_SESSION["surname"]."\nΕτών: ".$_SESSION["age"]."\nΦύλο: ". $_SESSION["sex"]);


$to= "akonna01@cs.ucy.ac.cy";
$sub ="Καταγγελία";
$subject ="=?UTF-8?B?".base64_encode($sub)."?=";
$from_user="Cyberethics";     
$from_email="bhj";
$headers = "From: $from_user <$from_email>\r\n"."Content-type: text/html; charset=UTF-8";               
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

//prepare the dwlwting query
$sql = "DELETE FROM hotlinecomplaint WHERE id=$_SESSION[id]";

//execute the query
if ($conn->query($sql) === TRUE) {
  
} 
else {
    echo "Error deleting record: " . $conn->error;
}

//prepare the query witcj saves the senden complaints
$sql1 = "INSERT INTO sendedhotline(id,complaintdate,sendToPoliceDate) Values ('$_SESSION[id]','$_SESSION[datetime]',NOW())"; 
//execute the bove query
if($conn->query($sql1)){  

}else{ 
  echo $conn->error;
}

//comnection closing
$conn->close();

//send the email
if (mail($to, $subject, $mess, $headers)){
    //succesfull message
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Email has sent Successfully')
            window.location.href='/leit/despHotLine.php';
            </SCRIPT>");
} 

?>






