<?php
session_start();
//echo $_SESSION["user"];

if (isset($_SESSION['user']) and strcmp("p",$_SESSION['role'])!=0  and strcmp("t",$_SESSION['role'])!=0 and strcmp("g",$_SESSION['role'])!=0 and strcmp("e",$_SESSION['role'])!=0) {

if(!isset($_POST['koko'])){
   echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('ERROR: YOU DONT HAVE ACCESS TO VIEW THIS PAGE PLEASE LOGIN.')
            window.location.href='http://localhost/leit/logoutses.php';
            </SCRIPT>");
}

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
mysqli_set_charset($conn, "utf8");
$sql = "SELECT  DateTime, name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,actionstaken FROM otheroperatorcomplaint where id= $_POST[koko] ";
$result = $conn->query($sql);
$_SESSION["helpdel"]= $_POST['koko'];

     // output data of each row
     $row = $result->fetch_assoc();
       $datetime=$row["DateTime"];
         $name=  $row["name"];
         $surname=  $row["surname"];
         $email= $row["email"];
         $age= $row["age"];
         if ($age==0){
          $age="";
         }
         $sex= $row["sex"];
          $WebsiteName=$row["WebsiteName"];
          $complaintFor=$row["complaintFor"];
$platformname=$row["platformname"];
$typeofcomplaint=$row["typeofcomplaint"];
$details=$row["details"];
$action=$row["actionstaken"];


$id=$_POST['koko'];

 $_SESSION["sex"]= $sex;
$_SESSION["name"]= $name;
$_SESSION["surname"]= $surname;
$_SESSION["email"]= $email;
$_SESSION["age"]= $age;
$_SESSION["WebsiteName"]= $WebsiteName;
$_SESSION["complaintFor"]= $complaintFor;
$_SESSION["platformname"]= $platformname;
$_SESSION["typeofcomplaint"]= $typeofcomplaint;
$_SESSION["details"]= $details;
 $_SESSION["id"]= $id;
 $_SESSION["datetime"]= $datetime;

 $conn->close();






?>

<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">

  <title>Καταγγελία</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

 <link rel="stylesheet" href="css/style.css">
       <script src="//code.jquery.com/jquery-1.10.2.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="css/style.css">
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

.button:hover {
  color: black ;

}
</style>
  
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
  <label class = "col-md-4 control-label" for="Date">Ετών</label>
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



 <div class="form-group">
  <label class="col-md-4 control-label">Ενέργειες</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control" name="comment"  id="det"   rows="4" disabled="" ><?php echo htmlspecialchars($action); ?></textarea>
  </div>
  </div>
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

<a href="/leit/despOperators.php" class="button"  style="background-color: #595352; width: 12%;" id="back"><span id="backk">Back</span></a>
                              <button id="modal" hidden="" type="button" class="button" data-toggle="modal"  style="background-color: #4a4ea8; width: 19%;" data-target="#myModal" >Προσθήκη Ενέργειας</button>
                               <button id="sendd" style="background-color: #47d138; " class="button" type="button" onclick="actions()" >Αποστολή Πίσω</button>
                              <!-- <a    href="/leit/deleteHotLine.php"  onclick="return confirm('Are you sure?')" class="button" style="background-color: #890916; width: 13%;" id="delete"><span id="deletee">Delete</span></a> -->
                              <!-- <button id="edit" type="Button" onclick="funcEdit()"  class="button" style="background-color: #f2e20c; width: 12%;"><span  id="eedit">Edit</span></button>
                              <button id="save" disabled type="submit"  style=" border-radius: 5px; background-color: #dddddd; width: 12%; height: 56px;  cursor: not-allowed;"><span id="savee" style="cursor: not-allowed;">Save</span></button> -->
                        <!--       <a id="sendH"  href="/leit/moveToHelpLine.php" onclick="return confirm('Are you sure you want to move the complaint to HelpLine?')" class="button" style="background-color: #db8008; width: 20%;"><span id="sendHH">Send to HelpLine</span></a>
                              <a id="sendP"  href="/leit/sendEmail.php"  onclick="return confirm('Are you sure?')" class="button" style="background-color: #0f0e59; width: 18%;"><span id="sendPP">Send to police</span></a> -->

</fieldset>
</form>
</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Προσθέστε Ενέργειες</h4>
        </div>
        <div class="modal-body">
          <textarea id="texting" style="width: 550px;height: 100px;" type="text" name=""></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Έξοδος</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="actionss()">Αποθήκευση</button>
        </div>
      </div>
      
    </div>
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
<script type="text/javascript">
  
  



  function actions() {
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", "sendOtherOpToHelpLine.php");

            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "action");
            hiddenField.setAttribute("value", document.getElementById("texting").value);

            form.appendChild(hiddenField);


    document.body.appendChild(form);
    form.submit();
}

function actionss() {
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", "insertActionOtherOperator.php");

            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "action");
            hiddenField.setAttribute("value", document.getElementById("texting").value);

            form.appendChild(hiddenField);


    document.body.appendChild(form);
    form.submit();
}
</script>

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


