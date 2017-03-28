<?php 


	if (isset($_SERVER['HTTP_ORIGIN'])) {
	        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	        header('Access-Control-Allow-Credentials: true');
	        header('Access-Control-Max-Age: 86400');    // cache for 1 day
	}
	 
	    // Access-Control headers are received during OPTIONS requests
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	 
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
	 
	    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
	       	header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	 	exit(0);
	}
	 
	 
	   	//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
	$postdata = file_get_contents("php://input");
	if (isset($postdata)) { 
		$request = json_decode($postdata);
		$name = $request->name;
		$surname = $request->surname;
		$email = $request->email;
		$sex = $request->sex;
		$DOB = $request->DOB;
		$ReportFor = $request->ReportFor;
		$activity = $request->activity;
		$url = $request->url;
		$details = $request->details;

		$name = empty($name)?"N/A":$name;
		$surname = empty($surname)?"N/A":$surname;
		$email = empty($email)?"N/A":$email;
		$sex = empty($sex)?"":$sex;
		if (empty($sex)) {
			$sex="";
		}
		else if($sex="Male"){
			$sex="M";
		}
		else{
			$sex="F";
		}

		$url = empty($url)?"N/A":$url;
		if(empty($DOB))
			$age =  0;
		else{
			$from = new DateTime($_POST['date']);
			$to = new DateTime('today');
			$age = $from->diff($to)->y; 
		}
		$details = empty($details)?"N/A":$details;


		try {
    	$conn = new PDO("mysql:host=$servername;dbname=case management platform", "root", "");
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//echo "Connected successfully"; 
	    }
		catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage();
	    }

	    

		//Prepare sql Statement
	 	$sql = "INSERT INTO HotlineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values (:name,:surname,:email,$age,'$sex','$ReportFor',:url,:var2,'$activity',:details,NOW())";
	    $statement = $conn->prepare($sql);
	   
		//Execute SQL statement
	    $query = $statement->execute(array(
	    	':name' => $name,
	    	':surname' => $surname,
	    	':email' => $email,
	    	':url' => $url,
	    	':var2' => "N/A",
	    	':details' => $details
	    ));
	}
	else {
		header('HTTP/1.1 400 Bad Request', true, 400);
	}

	

?>