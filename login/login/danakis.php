<html>

	<body>

	<?php
		$servername = "localhost";
		

		

		try {
	    	$conn = new PDO("mysql:host=$servername;dbname=test", "root", "1234");
	    	// set the PDO error mode to exception
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	//echo "Connected successfully"; 
	    }
		catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage();
	    }

	    if(empty($_POST['username']))
			$email = 'No username given. Try again';
		else  
			$username = $_POST['username'];

		$password = $_POST['password'];

/**
$password = 1;
$username = "Villa";

**/
		$sql = " Select * from testtable Where name = :username and ID = :password;" ;

		


    	$statement = $conn->prepare($sql);
    	$query = $statement->execute(array(
    	':username' => $username,
    	':password' => $password
    	
    	));

    	if($results = $statement->fetchAll(PDO::FETCH_ASSOC)){
    		echo "you have logged in";
    	}	
    	else{
    		echo "wrong username or password";
    	}





	?>



	</body>
</html>

