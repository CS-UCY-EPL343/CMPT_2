<html>
<body>

<?php

	
	$servername = "localhost";
	$username = "root";
	$password = "";



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



	echo "Email: "; if(empty($_POST['email']))
						 $email = 'N/A';
					else  
						$email = $_POST['email'];
					echo nl2br("\n");
	echo "Name: "; if(empty($_POST['name']))
						$name = "N/A";
					else
						$name = $_POST['name'];
					echo nl2br("\n");
	echo "Surname: "; if(empty($_POST['surname']))
						 $surname =  "N/A";
					  else
					  	 $surname = $_POST['surname'];
					  echo nl2br("\n");
	echo "Age: "; if(empty($_POST['date']))
						$age =  0;
				  else{
				  		$from = new DateTime($_POST['date']);
				  		$to = new DateTime('today');
				  		$age = $from->diff($to)->y; 
				  } echo nl2br("\n");

	echo "Gender: ";	$var = isset($_POST['gender'])? $_POST['gender']:'' ; echo $var; echo nl2br("\n");
	echo "URL: "; $var1 = isset($_POST['url'])? $_POST['url']: "N/A"; echo $var1; echo nl2br("\n");
	echo "Platform Name: "; $var2 = isset($_POST['VoIP']) ? $_POST['VoIP']: 'N/A'; echo $var2; echo nl2br("\n");
	echo "Report Type: ";	echo $_POST['ReportType']; echo nl2br("\n");
	echo "Details: "; $var3 = empty($_POST['Details'])? 'N/A': $_POST['Details']; echo $var3;


 	$sql = "INSERT INTO HotlineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values (:name,:surname,:email,$age,'$var','$_POST[ReportFor]',:var1,:var2,'$_POST[ReportType]',:var3,NOW())";
    $statement = $conn->prepare($sql);
    $query = $statement->execute(array(
    	':name' => $name,
    	':surname' => $surname,
    	':email' => $email,
    	':var1' => $var1,
    	':var2' => $var2,
    	':var3' => $var3
    ));


 ?>

</body>
</html>