<?php
session_start();

// echo $_SESSION["complaintid"];
 
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

$sql = "SELECT  name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details FROM helplinecomplaint where id= $_POST[koko] ";
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

 $conn->close();
?>

<!DOCTYPE html>

<html >
<head>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 15px 20px 15px 20px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
  <meta charset="UTF-8">
  <title>Καταγγελία</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>






<div id="olee"></div>
<body >



  <div class="container">

    <form class="well form-horizontal" action="action.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Στοιχεία Καταγγελίας</legend>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Καταγγελία για</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($complaintFor); ?>"  readonly rows="1"  ">
     
     
    </input>
  </div>
</div>
</div>


<!-- Text input-->
<div class="form-group">

  <label class="col-md-4 control-label">Διεύθυνση ιστοσελίδας(URL)</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="website" id="urll"   required="" autocomplete=off class="form-control" type="Text " value=" <?php echo htmlspecialchars($WebsiteName); ?>" disabled >
 
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
          <input class="form-control"  id="VoIP" value=" <?php echo htmlspecialchars($platformname); ?>" name="platname"    disabled="disabled"></input>
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
    <input name="state" class="form-control selectpicker" value=" <?php echo htmlspecialchars($typeofcomplaint); ?>"  disabled>
     <!--  <option value=" " >Είδος Καταγγελίας</option>
      <option>Παιδική Πορνογραφία</option>
      <option>Ρατσισμός/Ξενοφοβία</option>
      <option>Κλοπή Προσωπικών Δεδομένων(π.χ. Ψεύτικο Προφίλ)</option>
      <option>Παραβίαση Του Απορρήτου Των Επικοινωνιών(Hacking)</option>
      <option>Διαδικτυακός Εκφοβισμός</option>
      <option>Σεξουαλική Παρενόχληση</option>
      <option>Εθισμός Στο Διαδίκτυο</option>
      <option>Ηλεκτρονική Αποπλάνηση(Grooming)</option>
      <option> Ανεπιθύμητη Αλληλογραφία</option>
      <option>Εμπορικοί Κίνδυνοι/Απειλές (π.χ. Phishing)</option>
      -->
    </input>
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
          <textarea class="form-control" name="comment"     rows="4" disabled="" > <?php echo htmlspecialchars($details); ?></textarea>
  </div>
  </div>
</div>

 
 <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer"> 
    <div class="input-group">  
       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
  <input name="email" id="aelara" value=" <?php echo htmlspecialchars($email); ?>"  autocomplete=off class="form-control"  type="text" disabled>
    </div> 
  </div>
</div>
   
  
  
  <div class="form-group">
  <label class="col-md-4 control-label">'Ονομα</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" value=" <?php echo htmlspecialchars($name); ?>"  autocomplete=off class="form-control"  disabled>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Επίθετο</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" autocomplete=off class="form-control"  type="" disabled  value=" <?php echo htmlspecialchars($surname); ?>" >
    </div>
  </div>
</div>
 
  

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Ημερ. Γέννησης</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date" value=" <?php echo htmlspecialchars($age); ?>"  class="form-control input-md" id="date" disabled>
    </div>
  </div>
</div>

<div class="form-group">
                        <label class="col-md-4 control-label">Φύλο</label>
                        <div class="col-md-4">
                           
                                
                                    <input  name="hosting" value=" <?php echo htmlspecialchars($sex); ?>"  disabled  class="form-control input-md" ></input> 
                               
                            
                        </div>


                    </div>
                        <div>
                              <button class="button" style="background-color: #595352; width: 12%;"><span>Back</span></button>
                              <button class="button" style="background-color: #890916; width: 13%;"><span>Delete</span></button>
                              <button class="button" style="background-color: #f2e20c; width: 12%;"><span>Edit</span></button>
                              <button class="button" style="background-color: #db8008; width: 20%;"><span>Send to Hotline</span></button>
                              <button class="button" style="background-color: #0f0e59; width: 18%;"><span>Send to police</span></button>

                        </div>


<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Η καταγγελία καταχωρήθηκε</div>
 -->
<!-- Button -->
<!-- <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit"  class="btn btn-warning"  >Υποβολή<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div> -->
<p id="demo"></p>



</fieldset>
</form>
</div>


<!-- <?php

    // echo ("<SCRIPT LANGUAGE='JavaScript'>
    //         document.getElementById('VoIP').value =  'NIAOUUUopsdfdsfsf' ;
    //         </SCRIPT>");

   
   //document.getElementById("olee").innerHTML = oio;
?> -->






<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script src="js/index.js"></script> -->
   
    </div><!-- /.container -->
  
</body>


</html>
