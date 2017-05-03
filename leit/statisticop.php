<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("e",$_SESSION['role'])==0) {

?>



<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">

  <title>Καταγγελία</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="header-user-dropdown.css">

  
</head>






<div id="olee"></div>
<body >
<header class="header-user-dropdown">

    <div class="header-limiter">
        <h1>Λειτουργός Επόπτης</h1>

        <nav>
<!--             <a href="#" ></a>
 -->            <!-- <a href="#">View Statistics</a> -->
<!--             <a href="#">Live Chat</a>
 -->           <!--  <a href="#">Reports</a>
            <a href="#">Roles <span class="header-new-feature">new</span></a> -->
        </nav>


        <div class="header-user-menu">
            <img src="person.png" alt="User Image"/>

            <ul>
                <li><a href="/changepswd/change_password.php">Αλλαγή Κωδικού</a></li>
<!--                 <li><a href="index - Copy.html">Δημιουργία Φόρμας</a></li>
 -->                <li><a href="logoutses.php" class="highlight">Αποσύνδεση</a></li>
            </ul>
        </div>

    </div>

</header>
<div class="container">
<form class="well form-horizontal" action="sql.php" method="post"  id="contact_form" >
<fieldset>

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Από</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date1" type="Date" class="form-control input-md" id="date">
    </div>
  </div>
</div>

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Μέχρι</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date2" type="Date" class="form-control input-md" id="date">
    </div>
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label"></label>
  	<div class="col-md-4">
<!--                <button type="button"   class="btn btn-default " onclick="fyn()" >Πίσω<span class="glyphicon glyphicon-chevron-left"></span></button>
 -->
    	<button type="submit"  class="btn btn-warning"  >Εμφάνιση Στατιστικών<span class="glyphicon glyphicon-send"></span></button>

  	</div>
</div>
</form>
</fieldset>
</div>

</body>
</html>


<?php
}else{
 // echo "no set";
  echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: YOU DONT HAVE ACCESS TO VIEW THIS PAGE PLEASE LOGIN.')
            window.location.href='http://localhost/leit/logoutses.php';
            </SCRIPT>");
}

exit();
?>
