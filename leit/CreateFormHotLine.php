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




</style>
<body onload="contact_form.reset();">



  <div class="container">

    <form class="well form-horizontal" action="actionHotLine.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Δημιουργία Καταγγελίας HotLine</legend>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Καταγγελία για</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="ReportFor"  id="selectidr" class="form-control selectpicker"  onchange="myFunction()">
      <option value="" >Επιλέξε καταγγελια για</option>
      <option value="webpage">Ιστσελίδα</option>
      <option value="chatRoom">Εφαρμογή διαδικτυακής επικοινωνίας</option>
     
    </select>
  </div>
</div>
</div>


<!-- Text input-->
<div class="form-group">

  <label class="col-md-4 control-label">Διεύθυνση ιστοσελίδας(URL)</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="website" id="urll" placeholder="Διεύθυνση ιστοσελίδας(URL)"  required="" autocomplete=off class="form-control" type="Text " disabled="disabled">
  <!-- <script type="text/javascript">
    document.getElementById("urll").disabled = true
  </script> -->
    </div>
  </div>
</div>


<!-- onoma efarmogis
 -->
 <div class="form-group">
  <label class="col-md-4 control-label">Όνομα Εφαρμογής</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control"  id="VoIP" name="platname"   placeholder="Όνομα Εφαρμογής"  disabled="disabled"></textarea>
  </div>
  </div>
</div>


<!-- Text input
idos kataggelias-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Είδος Καταγγελίας</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="ReportType" class="form-control selectpicker" >
      <option value="" >Είδος Καταγγελίας</option>
      <option value="ChildPornography">Παιδική Πορνογραφία</option>
      <option value="Racism">Ρατσισμός/Ξενοφοβία</option>
      <option value="CopyrightInfrigment">Κλοπή Προσωπικών Δεδομένων(π.χ. Ψεύτικο Προφίλ)</option>
      <option value="Hacking">Παραβίαση Του Απορρήτου Των Επικοινωνιών(Hacking)</option>
      <option value="Bullying">Διαδικτυακός Εκφοβισμός</option>
      <option value="SexualHarassment">Σεξουαλική Παρενόχληση</option>
      <option value="InternetAddiction">Εθισμός Στο Διαδίκτυο</option>
      <option value="Grooming">Ηλεκτρονική Αποπλάνηση(Grooming)</option>
      <option value="Spam"> Ανεπιθύμητη Αλληλογραφία</option>
      <option value="Phishing">Εμπορικοί Κίνδυνοι/Απειλές (π.χ. Phishing)</option>
     
    </select>
  </div>
</div>
</div>



<!-- sxolia
 -->
 <div class="form-group">
  <label class="col-md-4 control-label">Λεπτομέρειες</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control" name="comment"  placeholder="Λεπτομέρειες"></textarea>
  </div>
  </div>
</div>

 
 <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer"> 
    <div class="input-group">  
       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
  <input name="email" id="aelara" placeholder="E-Mail Address" autocomplete=off class="form-control"  type="text">
    </div> 
  </div>
</div>
   
  
  
  <div class="form-group">
  <label class="col-md-4 control-label">'Ονομα</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Ονομα" autocomplete=off class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Επίθετο</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Επιθετο" autocomplete=off class="form-control"  type="text">
    </div>
  </div>
</div>
 
  

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Ημερ. Γέννησης</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date" type="Date" class="form-control input-md" id="date">
    </div>
  </div>
</div>

<div class="form-group">
                        <label class="col-md-4 control-label">Φύλο</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="m" /> Άρρεν
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="f" /> Θύλη
                                </label>
                            </div>
                        </div>
                    </div>



<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Η καταγγελία καταχωρήθηκε</div>
 -->
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit"  class="btn btn-warning"  >Υποβολή<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>
<p id="demo"></p>



</fieldset>
</form>
</div>


<!-- <script>
    function myNewFunction(sel)
    {


      if ( sel.options[sel.selectidr].value == "val1" ){
        document.getElementById("urll").disabled = true

      }
//         if(document.getElementById('selectid').value == "val1") {
//      //Do something
//      document.getElementById("urll").disabled = true
// }
    }
</script>
 -->




<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script src="js/index.js"></script>
    <script type="text/javascript">
  
  



 function myFunction() {
    var x = document.getElementById("selectidr").value;

    if (x=="webpage"){
     document.getElementById("VoIP").disabled = true;
     document.getElementById("urll").disabled = false;
      document.getElementById("VoIP").value = "";

      


}else if(x=="chatRoom") {
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
    </div><!-- /.container -->
  
</body>
</html>
