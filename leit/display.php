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


//mysql_select_db("test",$conn);
//$sql=mysqli_query("select * from members",$conn);
//$sql = " select * from members " ;

$sql=" SELECT * from members ";
$result = mysqli_query($conn,$sql);


echo $result;

// if (!$sql) { // add this check.
//     die('Invalid query: ' . mysql_error());
// }
/**
echo "<table border='1' >
<tr>
<td align=center> <b>Username</b></td>
<td align=center><b>Password</b></td>";

while($data = mysql_fetch_row($sql))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";

    echo "</tr>";
}
echo "</table>";
*/
?>