<?php
session_start();
?>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

  echo ("<SCRIPT LANGUAGE='JavaScript'>
            
            window.location.href='http://localhost/login/index.html';
            </SCRIPT>");

?>