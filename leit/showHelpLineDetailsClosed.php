
<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("g",$_SESSION['role'])==0) {



// echo $_SESSION["complaintid"];
 

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

//anagnwrisimotita elinikwn
mysqli_set_charset($conn, "utf8");


$sql = "SELECT  DateTime, name, surname, email, age, sex , complaintFor, WebsiteName, platformname, typeofcomplaint,details,actionstaken FROM closedhelpline where id= $_POST[koko] ";
$_SESSION["helpdel"]= $_POST['koko'];
$result = $conn->query($sql);


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





// echo $_POST["sended"];
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
// $_SESSION["user"]= $username;
// $_SESSION["user"]= $username;





 $conn->close();
?>

<!DOCTYPE html>

<html >
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8_general_ci">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
  <meta charset="UTF-8">
  <title>Καταγγελία</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="css/style.css">
       <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  

<script type="text/javascript">


 function createjson(){


        var xmlhttp;
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }


        xmlhttp.open("GET","createjsonRoleUName.php",true);
        xmlhttp.send();
        // xmlhttp.open("GET","createjsonRoleUName.php",true);
        // xmlhttp.send();
    }





	function showjson(){
    



    $(document).ready(function () {
        $.getJSON("empdataRoleUName.json", function (data) {

            var arrItems = [];      // THE ARRAY TO STORE JSON ITEMS.
            $.each(data, function (index, value) {
                arrItems.push(value);       // PUSH THE VALUES INSIDE THE ARRAY.
            });

            // EXTRACT VALUE FOR TABLE HEADER.
            var col = [];
            for (var i = 0; i < arrItems.length; i++) {
                for (var key in arrItems[i]) {
                    if (col.indexOf(key) === -1) {
                        col.push(key);
                    }
                }
            }


            // CREATE DYNAMIC TABLE.
            var table = document.createElement("table");
         //  table.id='tab';

            // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

            var tr = table.insertRow(-1);                   // TABLE ROW.

            for (var i = 0; i < col.length; i++) {
                var th = document.createElement("th");      // TABLE HEADER.
                th.innerHTML = col[i];
                tr.appendChild(th);
            }

            // ADD JSON DATA TO THE TABLE AS ROWS.
            for (var i = 0; i < arrItems.length; i++) {

                tr = table.insertRow(-1);

                for (var j = 0; j < col.length; j++) {
                    var tabCell = tr.insertCell(-1);
                    tabCell.innerHTML = arrItems[i][col[j]];

                }               
            }
                   var select = document.getElementById("year");
    for(var i =0; i < arrItems.length; i++) {
    var option = document.createElement('option');
    option.text = arrItems[i].username+"  "+arrItems[i].role;
    option.value=arrItems[i].username;
    // option.value="ael";
    select.add(option, 0);

      }
      var str = '<?php echo $_POST["sended"];?>';
      if(str=="y"){
       document.getElementById("process").hidden=true;
       document.getElementById("sendH").hidden=true;
       document.getElementById("year").style.visibility="hidden";
       
     }
                  // document.getElementById("ael").innerHTML=arrItems[3].username;
        });
    });
}



</script>






</head>






<div id="olee"></div>
<body onload=" createjson(),showjson()">



  <div class="container">

    <form class="well form-horizontal" method="post"  id="contact_form" action="helpLineUpdate.php">
<fieldset>

<!-- Form Name -->
<legend>Στοιχεία Καταγγελίας</legend>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Καταγγελία για</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span  class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
     <select disabled name="ReportFor"  id="selectidr" class="form-control selectpicker"  onchange="myFunction()"  onchange="myFunction()">
     <option  value="<?php echo htmlspecialchars($complaintFor); ?>" ><?php echo htmlspecialchars($complaintFor); ?></option> 
      <option value="Ιστσελίδα">Ιστσελίδα</option>
      <option value="Εφαρμογή διαδικτυακής επικοινωνίας">Εφαρμογή διαδικτυακής επικοινωνίας</option>
     
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
  <input name="website" id="urll"   required autocomplete=off class="form-control" type="Text " value="<?php echo htmlspecialchars($WebsiteName); ?>" disabled >
 
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
          <input class="form-control"  id="VoIP" value="<?php echo htmlspecialchars($platformname); ?>" name="platname"    disabled required></input>
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
    <select name="state" class="form-control selectpicker"   id="type"   disabled>
    <option value="<?php echo htmlspecialchars($typeofcomplaint);?>"><?php echo htmlspecialchars($typeofcomplaint);?></option>
      <option></option>
      <option>Παιδική Πορνογραφία</option>
      <option>Ρατσισμός/Ξενοφοβία</option>
      <option>Κλοπή Προσωπικών Δεδομένων(π.χ. Ψεύτικο Προφίλ)</option>
      <option>Παραβίαση Του Απορρήτου Των Επικοινωνιών(Hacking)</option>
      <option>Διαδικτυακός Εκφοβισμός</option>
      <option>Σεξουαλική Παρενόχληση</option>
      <option>Εθισμός Στο Διαδίκτυο</option>
      <option>Ηλεκτρονική Αποπλάνηση(Grooming)</option>
      <option>Ανεπιθύμητη Αλληλογραφία</option>
      <option>Εμπορικοί Κίνδυνοι/Απειλές (π.χ. Phishing)</option>
     
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
          <textarea class="form-control" name="comment"  id="det"   rows="4" disabled="" > <?php echo htmlspecialchars($details); ?></textarea>
  </div>
  </div>
</div>

 
 <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer"> 
    <div class="input-group">  
       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
  <input name="email" id="mail" value="<?php echo htmlspecialchars($email); ?>"  autocomplete=off class="form-control"  type="text" disabled>
    </div> 
  </div>
</div>
   
  
  
  <div class="form-group">
  <label class="col-md-4 control-label">'Ονομα</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" id="name" value="<?php echo htmlspecialchars($name); ?>"  autocomplete=off class="form-control"  disabled>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Επίθετο</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" id="surname" autocomplete=off class="form-control"  type="" disabled  value="<?php echo htmlspecialchars($surname); ?>" >
    </div>
  </div>
</div>
 
  

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Ετών</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date" value="<?php echo htmlspecialchars($age); ?>"  class="form-control input-md" id="date" disabled >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Φύλο</label>
  <div class="col-md-4">     
    <input  name="hosting" value="<?php echo htmlspecialchars($sex); ?>" id="gender" disabled  class="form-control input-md" ></input> 
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
<!-- href="/leit/deleteHelpLine.php"  -->
                              <button onclick="goback()" class="button" type="button" style="background-color: #595352; width: 12%;" id="back"><span id="backk">Πισω</span></button>

                            <!--   <button onclick="hideProcess()" id="process" class="button" type="button"  style="background-color: #57c1b3; width: 15%;">
                              <span>Ενέργειες</span></button>
                              
                              
                              <button hidden="" onclick="undohideProcess()" id="undoprocess" class="button" type="button"  style="background-color: #595352; width: 12%;">
                              <span id="undoprocesss">Πισω</span></button>

                              <a    href="/leit/deleteHelpLine.php" hidden="" onclick="return fun()" class="button" style="background-color: #890916; width: 13%;" id="delete"><span id="deletee">Διαγραφή</span></a> -->
                              
                          <!--     <button type="button" hidden id="addaction" class="button" style="background-color: #890916; width: 18%;" ><span>Προσθήκη Ενεργειας</button> -->
                               
                              <!-- <button onclick="closee()" type="button" hidden id="complete" class="button" style="background-color: #4a9642; width: 16%;" ><span id="complitee" >Ολοκλήρωση</span></button>
                              


                              <button id="edit" hidden type="Button" onclick="funcEdit()"  class="button" style="background-color: #f2e20c; width: 15%;"><span  id="eedit">Τροποποίηση</span></button>
                               



                              <button id="save" disabled hidden="" type="submit"  style=" border-radius: 5px; background-color: #dddddd; width: 12%; height: 56px;  cursor: not-allowed;"><span id="savee" style="cursor: not-allowed;">Αποθήκευση</span></button>
 -->

                              <!-- <a id="sendH" onclick="return fun()" href="/leit/moveToHotLine.php" class="button" style="background-color: #db8008; width: 20%;"><span id="sendHH">Send to Hotline</span></a> -->
                               <!-- <a id="sendP" onclick="return fun()" href="/leit/sendToOnotherOp.php" class="button" style="background-color: #0f0e59; width: 18%;"><span id="sendPP">Αποστολή σε λειτουργό</span></a>  -->
<!-- <button id="modal" hidden="" type="button" class="button" data-toggle="modal"  style="background-color: #4a4ea8; width: 19%;" data-target="#myModal" >Προσθήκη Ενέργειας</button>
 -->

     <!--    <span class="dropup">
            <select  hidden  id="year" class="btn btn-primary dropdown-toggle" type="input" data-toggle="dropdown" onchange="other()" style="height: 52px; font-size: 18px;" > 
              <span id="yearr" hidden class="caret"></span>
              <option  value="" id="yearr">Αποστολή </option>
            </select>


        </span>
   

        <span> <button  type="button" hidden="" onclick="post()" id="sending"  >Αποστολή</button>  </span>
        -->


</fieldset>
</form>
<div>


                              <!-- <a href="/leit/desp.php" class="button" style="background-color: #595352; width: 12%;"><span>Back</span></a>
                              <a  href="/leit/deleteHelpLine.php" class="button" style="background-color: #890916; width: 13%;"><span>Delete</span></a>
                              <button type="Button" onclick="funcEdit()" class="button" style="background-color: #f2e20c; width: 12%;"><span>Edit</span></button>
                              <button type="submit"  class="button" style="background-color: #26a313; width: 12%;"><span>Save</span></button>
                              <a href="/leit/moveToHotLine.php" class="button" style="background-color: #db8008; width: 20%;"><span>Send to Hotline</span></a>
                              <a href="/leit/sendEmail.php"class="button" style="background-color: #0f0e59; width: 18%;"><span>Send to police</span></a> -->

                        </div>
</div>



<!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
    
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
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="actions()">Αποθήκευση</button>
        </div>
      </div>
      
    </div>
  </div>
 -->




 
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
    

<div id="ant"></div>

<script type="text/javascript">




  function goback(){

    location.href = "operatorclosed.php";
  }

 function closee(){
    location.href = "closeHelpLineComplaint.php";
  }



//   function hideProcess(){
//    tr;

//     document.getElementById("back").hidden=true;
//     document.getElementById("process").hidden=true;
//     document.getElementById("sendH").hidden=true;

//     document.getElementById("year").style.visibility="hidden";

//     // document.getElementById("yearr").hidden=true;
//     // document.getElementById("yearrr").hidden=true;
//   document.getElementById("undoprocess").hidden=false;
//   document.getElementById("delete").hidden=false;
//    document.getElementById("edit").hidden=false;
//     document.getElementById("save").hidden=false;

//     // document.getElementById("addaction").hidden=false;
//     document.getElementById("complete").hidden=false;
//     document.getElementById("modal").hidden=false;
//   }

//   function undohideProcess(){
//     document.getElementById("back").hidden=false;
//     document.getElementById("process").hidden=false;
//     document.getElementById("sendH").hidden=false;
//     document.getElementById("year").style.visibility="visible";
//     // document.getElementById("yearr").hidden=true;
//     // document.getElementById("yearrr").hidden=true;
//     // document.getElementById("addaction").hidden=true;
// document.getElementById("modal").hidden=true;  
//   document.getElementById("delete").hidden=true;
//    document.getElementById("edit").hidden=true;
//    document.getElementById("complete").hidden=true;
//     document.getElementById("save").hidden=true;
//     document.getElementById("undoprocess").hidden=true;
//   }



// function post() {
//     method = "post"; // Set method to post by default if not specified.

//     // The rest of this code assumes you are not using a library.
//     // It can be made less wordy if you use one.
//     var form = document.createElement("form");
//     form.setAttribute("method", method);
//     form.setAttribute("action", "insertOperatorComplaint.php");

//             var hiddenField = document.createElement("input");
//             hiddenField.setAttribute("type", "hidden");
//             hiddenField.setAttribute("name", "other");
//             hiddenField.setAttribute("value", document.getElementById("year").value);

//             form.appendChild(hiddenField);


//     document.body.appendChild(form);
//     form.submit();
// }
// function actions() {
//     method = "post"; // Set method to post by default if not specified.

//     // The rest of this code assumes you are not using a library.
//     // It can be made less wordy if you use one.
//     var form = document.createElement("form");
//     form.setAttribute("method", method);
//     form.setAttribute("action", "insertAction.php");

//             var hiddenField = document.createElement("input");
//             hiddenField.setAttribute("type", "hidden");
//             hiddenField.setAttribute("name", "action");
//             hiddenField.setAttribute("value", document.getElementById("texting").value);

//             form.appendChild(hiddenField);


//     document.body.appendChild(form);
//     form.submit();
// }




//  function other() {
//  	if(document.getElementById("year").value != ""){
//         document.getElementById("sending").hidden=false;
//     }
//     else{
//     	document.getElementById("sending").hidden=true;
//     }
//   // document.getElementById("ant").innerHTML="aelllllllll";
//   // document.getElementById("year").value;
// }







//   function funcEdit(){

// //energopoiisi olwn twn field tis formas gia epeksergasia
// document.getElementById("selectidr").disabled=false;
// document.getElementById("urll").disabled=false;
// document.getElementById("VoIP").disabled=false;
// document.getElementById("type").disabled=false;
// document.getElementById("det").disabled=false;
// document.getElementById("mail").disabled=false;
// document.getElementById("name").disabled=false;
// document.getElementById("surname").disabled=false;
// document.getElementById("date").disabled=false;
// document.getElementById("gender").disabled=false;


// //allagi klasis se button
// document.getElementById("save").className = "button";

// //energopoiisi tou button kai allages sto xrwma kai sto curson 
// document.getElementById("save").disabled = false;
// document.getElementById("savee").style.cursor = "pointer";
// document.getElementById("save").style.backgroundColor = "#26a313";
// document.getElementById("save").style.cursor = "pointer";

// //allagi t text sto koumpi edit
// document.getElementById("eedit").innerHTML = "Undo Edit";
// document.getElementById("eedit").style.fontSize = "15px";




// //allagi xrwmatos twn allwn koumpiwn
// document.getElementById("delete").style.backgroundColor = "#dddddd";
// document.getElementById("undoprocess").style.backgroundColor = "#dddddd";
// document.getElementById("complete").style.backgroundColor = "#dddddd";
// document.getElementById("modal").style.backgroundColor = "#dddddd";
// // document.getElementById("sendH").style.backgroundColor = "#dddddd";

// // document.getElementById("sendP").style.backgroundColor = "#ffffff";



// //allagi cursor
// // document.getElementById("delete").hidden=true;
// //  document.getElementById("deletee").hidden=true;
// document.getElementById("delete").disabled = true;
// document.getElementById("undoprocess").disabled = true;
// document.getElementById("complete").disabled = true;
// document.getElementById("modal").disabled = true;
// document.getElementById("delete").style.cursor = "not-allowed";
// document.getElementById("complete").style.cursor = "not-allowed";
// document.getElementById("undoprocess").style.cursor = "not-allowed";
// document.getElementById("undoprocesss").style.cursor = "not-allowed";
// document.getElementById("modal").style.cursor = "not-allowed";
// document.getElementById("complitee").style.cursor = "not-allowed";

// //document.getElementById("sendH").style.cursor = "not-allowed";
// // document.getElementById("sendP").style.cursor = "not-allowed";
// document.getElementById("deletee").style.cursor = "not-allowed";
// //document.getElementById("backk").style.cursor = "not-allowed";
// //document.getElementById("sendHH").style.cursor = "not-allowed";
// // document.getElementById("sendPP").style.cursor = "not-allowed";


// //jquery gia disable twn href
// $( "a" ).click(function( event ) {
//   event.preventDefault();
// });







// //an patithei ksana kanei reload t selida
// document.getElementById("edit").onclick = function() {myFunctio()};

// myFunction();


// }


//  function myFunctio() {
   
// document.getElementById("selectidr").disabled=true;
// document.getElementById("urll").disabled=true;
// document.getElementById("VoIP").disabled=true;
// document.getElementById("type").disabled=true;
// document.getElementById("det").disabled=true;
// document.getElementById("mail").disabled=true;
// document.getElementById("name").disabled=true;
// document.getElementById("surname").disabled=true;
// document.getElementById("date").disabled=true;
// document.getElementById("gender").disabled=true;


// //allagi klasis se button
// document.getElementById("save").className = "button";

// //energopoiisi tou button kai allages sto xrwma kai sto curson 
// document.getElementById("save").disabled = true;
// document.getElementById("savee").style.cursor = "not-allowed";
// document.getElementById("save").style.backgroundColor = "#dddddd";
// document.getElementById("save").style.cursor = "not-allowed";

// //allagi t text sto koumpi edit
// document.getElementById("eedit").innerHTML = "Τροποποίηση";
// document.getElementById("eedit").style.fontSize = "15px";




// //allagi xrwmatos twn allwn koumpiwn
// document.getElementById("delete").style.backgroundColor = "#890916";
// document.getElementById("undoprocess").style.backgroundColor = "#595352";
// document.getElementById("complete").style.backgroundColor = "#4a9642";
// document.getElementById("modal").style.backgroundColor = "#4a4ea8";
// // document.getElementById("sendH").style.backgroundColor = "#dddddd";

// // document.getElementById("sendP").style.backgroundColor = "#ffffff";



// //allagi cursor
// // document.getElementById("delete").hidden=true;
// //  document.getElementById("deletee").hidden=true;
// document.getElementById("delete").disabled = false;
// document.getElementById("undoprocess").disabled = false;
// document.getElementById("modal").disabled = false;
// document.getElementById("complete").disabled = false;
// document.getElementById("delete").style.cursor = "pointer";
// document.getElementById("undoprocess").style.cursor = "pointer";
// document.getElementById("undoprocesss").style.cursor = "pointer";
// document.getElementById("modal").style.cursor = "pointer";
// document.getElementById("complete").style.cursor = "pointer";
// document.getElementById("complitee").style.cursor = "pointer";

// //document.getElementById("sendH").style.cursor = "not-allowed";
// // document.getElementById("sendP").style.cursor = "not-allowed";
// document.getElementById("deletee").style.cursor = "pointer";


// document.getElementById("edit").onclick = function() {funcEdit()};



// }

//  function fun() {
//  var x=document.getElementById("save").disabled;
// if(x==true){
//   return confirm("Είστε σίγουρος;");
// }
// else{
//   return false;
//   // document.getElementById("eedit").innerHTML = "aellaraolee"
// }
// // document.getElementById("eedit").innerHTML = x;
// //   if(document.getElementById("save").disabled  == false){
// //     document.getElementById("eedit").innerHTML = "aellara";
// //   }
// //  else{  
// // document.getElementById("eedit").innerHTML = "aellaraolee";
// // }
// }

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


// function myFu() {
//     var txt;
//     var r = confirm("Press a button!\nEither OK or Cancel.\nThe button you pressed will be displayed in the result window.");
//     if (r == true) {
//         txt = "You pressed OK!";
//     } else {
//         txt = "You pressed Cancel!";
//     }
//     document.getElementById("ant").innerHTML = txt;
// }



</script>



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