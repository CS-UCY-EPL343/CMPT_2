<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user'])) {




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




if(count($_POST)>0) {
$result = $conn->query("SELECT *from operator WHERE username='" . $_SESSION["user"] . "'");
$row=$result->fetch_assoc();
if($_POST["currentPassword"] == $row["password"]) {
$conn->query("UPDATE operator set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["user"] . "'");
$message = "Password Changed";
echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Ο κωδικός αλλάκτηκε επιτυχώς')
           history.go(-2)
            </SCRIPT>");

} else echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Ο τρέχον κωδικός δεν είναι σωστός!')
     
            </SCRIPT>");

}
?>
<html>
<head>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	//document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	//document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	//document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}                       
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	//document.getElementById("confirmPassword").innerHTML = "not same";
	confirm("Ο Νέος Και Ο Επιβεβαίωμένος Κωδικός Δεν Είναι Το Ίδιο!");
	output = false;
} 	
return output;
}
</script>
</head>
<body onload="contact_form.reset();">



  <div class="container">

    <form name="frmChange" class="well form-horizontal" action="" method="post"  id="contact_form" data-toggle="validator" onSubmit="return validatePassword()">
<fieldset>

<!-- Form Name -->
<legend>Αλλαγή Κωδικού</legend>

<!-- Text input-->
<!-- <div class="form-group"> 
  <label class="col-md-4 control-label">Καταγγελία για</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="ReportFor"  id="selectidr" class="form-control selectpicker"  onchange="myFunction()">
      <option value="" >Επιλέξε καταγγελια για</option>
      <option value="Ιστσελίδα">Ιστσελίδα</option>
      <option value="Εφαρμογή διαδικτυακής επικοινωνίας">Εφαρμογή διαδικτυακής επικοινωνίας</option>
     
    </select>
  </div>
</div>
</div> -->


<!-- Text input-->
<div class="form-group">

  <label class="col-md-4 control-label">Τρέχον Κωδικός</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="currentPassword" id="currentPassword" placeholder="Τρέχον Κωδικός"  required="" autocomplete=off class="form-control" type="password" >
  <!-- <script type="text/javascript">
    document.getElementById("urll").disabled = true
  </script> -->
    </div>
  </div>
</div>


<!-- onoma efarmogis
 -->
 <div class="form-group">
  <label class="col-md-4 control-label">Νέος Κωδικός</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control"  id="newPassword" name="newPassword" required=""  placeholder="Νέος Κωδικός"   ></input>
  </div>
  </div>
</div>



 
 <div class="form-group">
  <label class="col-md-4 control-label">Επιβεβαίωση</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
          <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" required="" placeholder="Επιβεβαίωση" ></input>
  </div>
  </div>
</div>

 
 



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
       <button type="button"   class="btn btn-default " onclick="fyn()" >Πίσω<span class="glyphicon glyphicon-chevron-left"></span></button>

    <button type="submit"  class="btn btn-warning"  >Αλλαγή<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>
<p id="demo"></p>



</fieldset>
</form>
</div>






<script type="text/javascript">
  function fyn(){
     history.go(-1);
  }
</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script src="js/index.js"></script>
   
    </div>
  
</body></html>


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
