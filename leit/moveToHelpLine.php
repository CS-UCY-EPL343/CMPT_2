<?php
//MOVE A HOT LINE COMMPLAINT TO HELP LINE
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
    
    //prepare the the query
    $sql = "SELECT  name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,DateTime, sentfrom FROM hotlinecomplaint where id= $_SESSION[helpdel]";

    //for greek characters
    mysqli_set_charset($conn, "utf8");
    //execute the query
    $result = $conn->query($sql);

    // output data of each row
    $row = $result->fetch_assoc();
    $name=  $row["name"];
    $surname=  $row["surname"];
    $email= $row["email"];
    $age= $row["age"];
    $sex= $row["sex"];
    $WebsiteName=$row["WebsiteName"];
    $complaintFor=$row["complaintFor"];
    $platformname=$row["platformname"];
    $typeofcomplaint=$row["typeofcomplaint"];
    $details=$row["details"];
    $dateTime=$row["DateTime"];
        $sentfrom=$row["sentfrom"];

    //prepare the query for moving
    $sql = "INSERT INTO HelpLineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime,sentfrom) Values ('$name','$surname','$email','$age','$sex','$complaintFor','$WebsiteName','$platformname','$typeofcomplaint','$details','$dateTime','$sentfrom')";
    //prepare the delete query
    $sqll = "DELETE FROM hotlinecomplaint WHERE ID=$_SESSION[helpdel]";
  
    //execute the queries
    if ( ($conn->query($sql) === TRUE) &&  ($conn->query($sqll) === TRUE)  ) {
        //message for succesful moving
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Η καταγγελία μεταφέρτηκε επιτυχώς!')
            window.location.href='/leit/despHotLine.php';
            </SCRIPT>");
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
else{
    echo "error";
}


?>