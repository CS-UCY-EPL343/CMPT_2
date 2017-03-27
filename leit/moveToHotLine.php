<?php

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
    //for greek characters
    mysqli_set_charset($conn, "utf8");
    //prepare the query
    $sql = "SELECT  name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,DateTime FROM helplinecomplaint where id= $_SESSION[helpdel]";
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
    
    //prepare the moving query
    $sql = "INSERT INTO HotLineComplaint(Name,Surname,email,Age,Sex,ComplaintFor,WebsiteName,PlatformName,TypeofComplaint,Details,DateTime) Values ('$name','$surname','$email','$age','$sex','$complaintFor','$WebsiteName','$platformname','$typeofcomplaint','$details','$dateTime')";
    //prepare the deleting query
    $sqll = "DELETE FROM helplinecomplaint WHERE id=$_SESSION[helpdel]";
    

    // execut the queries
    if ( ($conn->query($sql) === TRUE) &&  ($conn->query($sqll) === TRUE)  ) {
        //succesfull message
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Complaint Removed Successfully')
            window.location.href='/leit/desp.php';
            </SCRIPT>");
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "ERROR";
}

?>