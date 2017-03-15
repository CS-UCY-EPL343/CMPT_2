<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user'])) {
echo "set";
}else{
	echo "no set";
}

exit();
?>

<?php
session_destroy();
?>