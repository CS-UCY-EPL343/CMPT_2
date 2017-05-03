<html>
<body>



<?php
	//HOTLINE COMPLAINT
	
	$servername = "localhost";
	$username = "root";
	$password = "1234";



	try {
    	$conn = new PDO("mysql:host=$servername;dbname=case management platform", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//echo "Connected successfully"; 
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
  
  $conn->exec("set names utf8");



	if(empty($_POST['email']))
		$email = '';
	else  
		$email = $_POST['email'];
	if(empty($_POST['name']))
		$name = "";
	else
		$name = $_POST['name'];
					
	if(empty($_POST['surname']))
		$surname =  "";
	else
		$surname = $_POST['surname'];
					  
	if(empty($_POST['date']))
		$age =  0;
	else{
		$from = new DateTime($_POST['date']);
		$to = new DateTime('today');
		$age = $from->diff($to)->y; 
	} echo nl2br("\n");

	$var = isset($_POST['gender'])? $_POST['gender']:'' ; echo $var; //Gender
	$var1 = isset($_POST['url'])? $_POST['url']: "";//URL
	$var2 = isset($_POST['VoIP']) ? $_POST['VoIP']: '';//Platform Name
	$var3 = empty($_POST['Details'])? '': $_POST['Details'];//Details

	//Prepare sql Statement
 	$sql = "INSERT INTO HotlineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime,sentfrom) Values (:name,:surname,:email,$age,'$var','$_POST[ReportFor]',:var1,:var2,'$_POST[ReportType]',:var3,NOW(),'w')";
    $statement = $conn->prepare($sql);
   
	//Execute SQL statement
    $query = $statement->execute(array(
    	':name' => $name,
    	':surname' => $surname,
    	':email' => $email,
    	':var1' => $var1,
    	':var2' => $var2,
    	':var3' => $var3
    ));

    echo "<script type='text/javascript'>alert('Complaint Submitted Succesfully');history.go(-1);</script>";

 ?>

</body>
</html>