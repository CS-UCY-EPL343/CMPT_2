<html>
<body>



<?php
	//HOTLINE COMPLAINT
	
	$servername = "localhost";
	$username = "root";
	$password = "1234";



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



	if(empty($_POST['email']))
		$email = 'N/A';
	else  
		$email = $_POST['email'];
	if(empty($_POST['first_name']))
		$name = "N/A";
	else
		$name = $_POST['first_name'];
					
	if(empty($_POST['last_name']))
		$surname =  "N/A";
	else
		$surname = $_POST['last_name'];
					  
	if(empty($_POST['date']))
		$age =  0;
	else{
		$from = new DateTime($_POST['date']);
		$to = new DateTime('today');
		$age = $from->diff($to)->y; 
	} echo nl2br("\n");

     // echo $from;
     // echo$to;
     
	$var = isset($_POST['hosting'])? $_POST['hosting']:'' ; //echo $var; //Gender
	$var1 = isset($_POST['website'])? $_POST['website']: "N/A";//URL
	$var2 = isset($_POST['platname']) ? $_POST['platname']: 'N/A';//Platform Name
	$var3 = empty($_POST['comment'])? 'N/A': $_POST['comment'];//Details

     
	//Prepare sql Statement
 	$sql = "INSERT INTO HotLineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values (:name,:surname,:email,'$age','$var','$_POST[ReportFor]',:var1,:var2,'$_POST[ReportType]',:var3,NOW())";
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

   // echo $var3+'\n';
   //  echo $var2;
   //   echo $var1;
   //    echo $var;
   //     echo $age;
   //      echo $name;
   //       echo $surname;
   //        echo $email;
      

   echo "<script type='text/javascript'>alert('Complaint Submitted Succesfully');history.go(-2);</script>";

 ?>

</body>
</html>