<html>

	<?php

	//HELPLINE COMPLAINT

	$servername = "localhost";
	$username = "cyberethics";
	$password = "5cfvtzS2mpUZrr87";

	error_reporting(0);


	try {
    	$conn = new PDO("mysql:host=$servername;dbname=cyberethics", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//echo "Connected successfully"; 
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }


    echo "helpline";

	if(!empty($_POST['email'])){
		$email = $_POST['email'];
	}	
	else{
		$email = "a";
	}
	
					
	if(empty($_POST['name']))
		$name = "N/A";
	else
		$name = $_POST['name'];
					
	if(empty($_POST['surname']))
		$surname =  "N/A";
	else
		$surname = $_POST['surname'];
					  
	if(empty($_POST['date']))
		$age =  0;
	else{
		$from = new DateTime($_POST['date']);
		$to = new DateTime('today');
		$age = $from->diff($to)->y; 
	}

	//echo $_POST['url'];
	echo $_POST['VoIP'];

	$var = isset($_POST['gender'])? $_POST['gender']:'' ; echo $var; //Gender
	$var1 = isset($_POST['url'])? $_POST['url']: "N/A";//URL
	$var2 = isset($_POST['VoIP']) ? $_POST['VoIP']: 'N/A';//Platform Name
	$var3 = empty($_POST['Details'])? 'N/A': $_POST['Details'];//Details

	//Prepare sql Statement
 	$sql = "INSERT INTO HelplineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values (:name,:surname,:email,$age,'$var','$_POST[ReportFor]',:var1,:var2,'$_POST[ReportType]',:var3,NOW())";
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

    if($query){ echo "<script type='text/javascript'>alert('Complaint Submitted Succesfully');history.go(-1);</script>";}

 ?>


</html>