<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("g",$_SESSION['role'])==0) {

?>

<html>
<head>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<title>Insert Operator</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>

</script>
</head>
<body onload="contact_form.reset();">



  <div class="container">

    <form name="frmChange" class="well form-horizontal" action="insertOperatorAction.php" method="post"  id="contact_form" data-toggle="validator" ">
<fieldset>

<!-- Form Name -->
<legend>Προσθήκη Λειτουργού</legend>




<!-- Text input-->
<div class="form-group">

  <label class="col-md-4 control-label">Όνομα Χρήστη</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="  glyphicon glyphicon-user"></i></span>
  <input  name="uname" id="currentPassword" placeholder="Όνομα Χρήστη"  required="" autocomplete=off class="form-control" type="text" >

    </div>
  </div>
</div>


<!-- onoma efarmogis
 -->
 <div class="form-group">
  <label class="col-md-4 control-label">Κωδικός</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="text" class="form-control"  id="newPassword" name="pword" required=""  placeholder="Κωδικός"   ></input>
  </div>
  </div>
</div>



 
 <div class="form-group">
  <label class="col-md-4 control-label">Ρόλος</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="  glyphicon glyphicon-wrench"></i></span>
          <input id="confirmPassword" type="text" class="form-control" name="role" required="" placeholder="Ρόλος" ></input>
  </div>
  </div>
</div>

 
 



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
         <button type="button"   class="btn btn-default " onclick="fyn()" >Πίσω<span class="glyphicon glyphicon-chevron-left"></span></button>

    <button type="submit"  class="btn btn-warning"  >Προσθήκη<span class="glyphicon glyphicon-send"></span></button>
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
