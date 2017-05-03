<html>
<body>

<?php
	//hotLine registration to database
	
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
    	//echo "Connected successfully"; 
    	echo "Connection failed: " . $e->getMessage();
    }

	//for greek characters
	$conn->exec("set names utf8");


    //get the fields from the form (POST table) and initialize the variables
	if(empty($_POST['email2']))
		$email = '';
	else  
		$email = $_POST['email2'];
	if(empty($_POST['first_name']))
		$name = "";
	else
		$name = $_POST['first_name'];
					
	if(empty($_POST['last_name']))
		$surname =  "";
	else
		$surname = $_POST['last_name'];
					  
	if(empty($_POST['date']))
		$age =  0;
	else{
		$from = new DateTime($_POST['date']);
		$to = new DateTime('today');
		$age = $from->diff($to)->y; 
	} echo nl2br("\n");

          
	$var = isset($_POST['hosting'])? $_POST['hosting']:'' ; //echo $var; //Gender
	$var1 = isset($_POST['website'])? $_POST['website']: "";//URL
	$var2 = isset($_POST['platname']) ? $_POST['platname']: '';//Platform Name
	$var3 = empty($_POST['comment'])? '': $_POST['comment'];//Details
    $sentfrom=$_POST['from'];
     
	//Prepare sql Statement
 	$sql = "INSERT INTO HotLineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime,sentfrom) Values (:name,:surname,:email,'$age','$var','$_POST[ReportFor]',:var1,:var2,'$_POST[ReportType]',:var3,NOW(),'$sentfrom')";
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

   //message for succesfull sumbitted and go 2 pages back
   echo "<script type='text/javascript'>alert('Η καταγγελία καταχωρήθηκε επιτυχώς ');history.go(-2);</script>";

 ?>

</body>
</html>