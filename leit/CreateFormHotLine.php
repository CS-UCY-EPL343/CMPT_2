<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("t",$_SESSION['role'])==0) {

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

</head>


<body onload="contact_form.reset();">

  <div class="container">

    <form class="well form-horizontal" action="actionHotLine.php" method="post"  id="contact_form">
<fieldset>


<legend>Δημιουργία Καταγγελίας HotLine</legend>

<!-- report for input -->
<div class="form-group"> 
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
</div>

<!-- url input -->
<div class="form-group">
	<label class="col-md-4 control-label">Διεύθυνση ιστοσελίδας(URL)</label>  
   	<div class="col-md-4 inputGroupContainer">
    	<div class="input-group">
        	<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  			<input name="website" id="urll" placeholder="Διεύθυνση ιστοσελίδας(URL)"  required="" autocomplete=off class="form-control" type="Text " disabled="disabled">
    	</div>
  	</div>
</div>


<!-- platform name input -->
<div class="form-group">
	<label class="col-md-4 control-label">Όνομα Εφαρμογής</label>
    <div class="col-md-4 inputGroupContainer">
    	<div class="input-group">
        	<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          	<textarea class="form-control"  id="VoIP" name="platname"   placeholder="Όνομα Εφαρμογής"  disabled="disabled"></textarea>
  		</div>
  	</div>
</div>

<!-- report type input -->
<div class="form-group"> 
	<label class="col-md-4 control-label">Είδος Καταγγελίας</label>
    <div class="col-md-4 selectContainer">
    	<div class="input-group">
        	<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    		  <select name="ReportType" class="form-control selectpicker" >
      			<option value="">Είδος Καταγγελίας</option>
			      <option value="Παιδική Πορνογραφία">Παιδική Πορνογραφία</option>
			      <option value="Ρατσισμός/Ξενοφοβία">Ρατσισμός/Ξενοφοβία</option> 
		        <option value="Hacking">Hacking</option>  
   		     </select>
      </div>
	</div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Από</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          <select name="from" class="form-control selectpicker" >
            <option value="">Από</option>
            <option value="m">Email</option>
            <option value="c">Chat</option> 
            <option value="p">Τηλέφωνο</option>  
           </select>
      </div>
  </div>
</div>

<!--comments input-->
<div class="form-group">
	<label class="col-md-4 control-label">Λεπτομέρειες</label>
    <div class="col-md-4 inputGroupContainer">
    	<div class="input-group">
        	<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          	<textarea class="form-control" name="comment"  placeholder="Λεπτομέρειες"></textarea>
  		</div>
  	</div>
</div>

 <!-- email input -->
<div class="form-group">
	<label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer"> 
    	<div class="input-group">  
        	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
  			<input name="email2" id="aelara" placeholder="E-Mail Address" autocomplete=off class="form-control"  type="text">
    	</div> 
  	</div>
</div>
   
  
  <!-- first name input -->
<div class="form-group">
	<label class="col-md-4 control-label">'Ονομα</label>  
  	<div class="col-md-4 inputGroupContainer">
  		<div class="input-group">
  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  			<input  name="first_name" placeholder="Ονομα" autocomplete=off class="form-control"  type="text">
    	</div>
  	</div>
</div>

<!-- last name input -->
<div class="form-group">
	<label class="col-md-4 control-label" >Επίθετο</label> 
   	<div class="col-md-4 inputGroupContainer">
    	<div class="input-group">
  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  			<input name="last_name" placeholder="Επιθετο" autocomplete=off class="form-control"  type="text">
    	</div>
  	</div>
</div>
 
  <!-- birthday input -->
<div class="form-group">
  	<label class = "col-md-4 control-label" for="Date">Ημερ. Γέννησης</label>
  	<div class="col-md-4 inputGroupContainer">
  		<div class="input-group">
    		<input name ="date" type="Date" class="form-control input-md" id="date">
    	</div>
  	</div>
</div>

<!-- gender input -->
<div class="form-group">
    <label class="col-md-4 control-label">Φύλο</label>
    <div class="col-md-4">
        <div class="radio">
            <label>
                <input type="radio" name="hosting" value="Α" /> Άρρεν
            </label>
        </div>
        <div class="radio">
        	<label>
            	<input type="radio" name="hosting" value="Γ" /> Θύλη
        	</label>
        </div>
    </div>
</div>



<!-- submit button -->
<div class="form-group">
	<label class="col-md-4 control-label"></label>
  	<div class="col-md-4">
               <button type="button"   class="btn btn-default " onclick="fyn()" >Πίσω<span class="glyphicon glyphicon-chevron-left"></span></button>

    	<button type="submit"  class="btn btn-warning"  >Υποβολή<span class="glyphicon glyphicon-send"></span></button>

  	</div>
</div>

<p id="demo"></p>



</fieldset>
</form>
</div>


<script type="text/javascript">
  function fyn(){
     location.href = "/leit/despHotLine.php";
  }
  </script>
<!--libraries-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<!-- java script file for checks -->
<script src="js/index.js"></script>


<script type="text/javascript">
  
  // function witch disable and anable the fields in deppend of opparator clicks
function myFunction() {
   	var x = document.getElementById("selectidr").value;

   	if (x=="Ιστσελίδα"){
    	document.getElementById("VoIP").disabled = true;
     	document.getElementById("urll").disabled = false;
      	document.getElementById("VoIP").value = "";

	}else if(x=="Εφαρμογή διαδικτυακής επικοινωνίας") {
       document.getElementById("urll").disabled = true;
       document.getElementById("VoIP").disabled = false;
       document.getElementById("urll").value = "";
 	}
	else{
 		document.getElementById("urll").disabled = true;
 		document.getElementById("VoIP").disabled = true;
  		document.getElementById("urll").value = "";
    	document.getElementById("VoIP").value = "";    
	}
}

</script>
    </div>
  
</body>
</html>

<?php
}else{
 // echo "no set";
  echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: YOU DONT HAVE ACCESS TO VIEW THIS PAGE PLEASE LOGIN.')
            window.location.href='http://localhost/leit/logoutses';
            </SCRIPT>");
}

exit();
?>