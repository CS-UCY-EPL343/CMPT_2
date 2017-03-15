 
<?php
session_start();
?>

<html>

	<body>

	<?php
	//session_start();
		$servername = "localhost";
		

		

		try {
	    	$conn = new PDO("mysql:host=$servername;dbname=cyberethics", "root", "1234");
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
        

        $usernameoper= $_POST['username'];
        

		$sql = " Select * from operator Where username = :username and password = :password;" ;
        $sqll = "SELECT  role from operator where username = '$usernameoper' " ;
		


    	$statement = $conn->prepare($sql);
    	$query = $statement->execute(array(
    	':username' => $username,
    	':password' => $password
    	
    	));

    	
//query result
// $books = array();
$sth = $conn->query($sqll);
 $row = $sth->fetch(PDO::FETCH_ASSOC) ;
// if( $row['role']=='p')
	
    	//$_SESSION["user"]= $username;


//echo $_SESSION["user"];

// try {
// 	    	$connn = new PDO("mysql:host=$servername;dbname=cyberethics", "root", "1234");
// 	    	// set the PDO error mode to exception
// 	    	$connn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	    	//echo "Connected successfully"; 
// 	    }
// 		catch(PDOException $e)
// 	    {
// 	    	echo "Connection failed: " . $e->getMessage();
// 	    }


//   $result = $connn->query($sqll);


//      // output data of each row
//      $row = $result->fetch_assoc();


    	if($results = $statement->fetchAll(PDO::FETCH_ASSOC)){


                      if( $row['role']=='t'){

    					echo ("<SCRIPT LANGUAGE='JavaScript'>
            
             window.location.href='http://localhost/leit/despHotLine.php';
            </SCRIPT>");
    				 }

    				 else if( $row['role']=='p'){

                       echo ("<SCRIPT LANGUAGE='JavaScript'>
            
             window.location.href='http://localhost/leit/desp.php';
            </SCRIPT>");


    				 }
    					$_SESSION["user"]= $username;
    		//echo "you have logged in";
    	}	
    	else{
    		echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: Wrong Username or Password!  Try again')
            window.location.href='http://localhost/login/index.html';
            </SCRIPT>");
 
    	}





	?>



	</body>
</html>

