
<?php

     //create json files withc conatins the id and the day of help line complaints

    //open connection to mysql db
    $connection = mysqli_connect('localhost','root','1234','cyberethics') or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select ID, DateTime from reportedhelpline";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
echo "testarisma".($SESSION["var"]) ;
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    //echo json_encode($emparray);
//write to json file
    $fp = fopen('empdatahelplinereported.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
    //close the db connection
    mysqli_close($connection);
?>


