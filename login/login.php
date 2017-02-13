
<html>

	<body>

	<?php
	//session_start();
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


	    if(empty($_POST['username'])){
			$username = 'No username given. Try again';
			//echo  '<script>';
			//echo 'alert("ERROR: The username field is empty! Try again")';
			//echo 'window.location.replace = "http://localhost/login/index.html"';
			//echo 'window.location.replace(\"http://localhost")';
			//echo '</script>';
			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: The username field is empty! Try again')
            window.location.href='http://localhost/login/index.html';
            </SCRIPT>");

		}
		else  
			$username = $_POST['username'];

	    if(empty($_POST['password'])){
			$username = 'No username given. Try again';

			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: The Password field is empty! Try again')
            window.location.href='http://localhost/login/index.html';
            </SCRIPT>");

		}
		else
		$password = $_POST['password'];


		$sql = " Select * from members Where username = :username and password = :password;" ;

		


    	$statement = $conn->prepare($sql);
    	$query = $statement->execute(array(
    	':username' => $username,
    	':password' => $password
    	
    	));

    	if($results = $statement->fetchAll(PDO::FETCH_ASSOC)){
    					echo ("<SCRIPT LANGUAGE='JavaScript'>
            
            window.location.href='http://localhost/leit/desp.html';
            </SCRIPT>");
    		//echo "you have logged in";
    	}	
    	else{
    		echo "wrong username or password";
 
    	}





	?>



	</body>
</html>

