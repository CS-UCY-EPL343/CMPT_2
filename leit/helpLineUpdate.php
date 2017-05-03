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
  
  //for greek characters
  mysqli_set_charset($conn, "utf8");

  //prepare the query
  $sql = "SELECT  DateTime, name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details FROM helplinecomplaint where id= $_SESSION[helpdel] ";
  
  //execute the query
  $result = $conn->query($sql);

  // output data of each row
  $row = $result->fetch_assoc();
  $datetime=$row["DateTime"];
  $name=  $row["name"];
  $surname=  $row["surname"];
  $email= $row["email"];
  $age= $row["age"];
  if ($age==0){
    $age="";
  }
  $sex= $row["sex"];
  $WebsiteName=$row["WebsiteName"];
  $complaintFor=$row["complaintFor"];
  $platformname=$row["platformname"];
  $typeofcomplaint=$row["typeofcomplaint"];
  $details=$row["details"];


  //get the updates of fields
  if(empty($_POST['email']))
	   $eemail = '';
	else  
		$eemail = $_POST['email'];
	if(empty($_POST['first_name']))
		$nname = "";
	else
		$nname = $_POST['first_name'];
					
	if(empty($_POST['last_name']))
		$ssurname =  "";
	else
		$ssurname = $_POST['last_name'];
					  
  if($_POST['date']==""){
    $aage=0;
  }
  else{
    $aage=$_POST['date'];
  }       
	$var = isset($_POST['hosting'])? $_POST['hosting']:'' ; //echo $var; //Gender
	$var1 = isset($_POST['website'])? $_POST['website']: "";//URL
	$var2 = isset($_POST['platname']) ? $_POST['platname']: '';//Platform Name
	$var3 = empty($_POST['comment'])? '': $_POST['comment'];//Details
  $var4= $_POST['ReportFor'];
  $var5 =$_POST['state'];

  //prepare the update query
  $sql = "UPDATE helplinecomplaint SET name='$nname', surname='$ssurname', email='$eemail',
  age=$aage, sex='$var',
  complaintFor='$var4', WebsiteName='$var1', platformname='$var2', typeofcomplaint = '$var5' , details='$var3'   WHERE id=$_SESSION[helpdel]";

  //execuyr the update query
  if ($conn->query($sql) === TRUE) {
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Η καταγγελία τροποποιήθηκε επιτυχώς!')
            window.location.href='/leit/desp.php';
            </SCRIPT>");
  } 
  else {
    echo "Error updating record: " . $conn->error;
  }
  //connection closing
  $conn->close();

}

else 
echo "Problem has Occured"; 

?>