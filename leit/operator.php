<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("g",$_SESSION['role'])==0) {

?>



<html>
<head>
<script src="getDate.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script> 
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 

          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="header-user-dropdown.css">
      
    <style type="text/css">
        button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    position:relative;
    left:15%;
    top: 30px;
}


.dropbtn {
   /* background-color: #4CAF50;*/
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 188px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content p {
    color: black;
    padding: 5px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content p:hover {background-color: #f1f1f1;
    cursor: pointer;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    color: #e9ac09;
}
    </style>
    


    
    <script>
    //setTimeout(createjson, 3000);
window.setInterval(createjson, 100);
     function createjson(){


        var xmlhttp;
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }


        xmlhttp.open("GET","createjson.php",true);
        xmlhttp.send();
    }

</script>



  <style type="text/css">
    #hl{
        color: #e9ac09;
    }

</style>
</head>

<body >

      

<header class="header-user-dropdown">

    <div class="header-limiter">
         <h1><a  href="/leit/operatorHome.php">Γενικος Λειτουργός</a></h1>

        <nav>


        <div class="dropdown">
  <span class="dropbtn" >Καταγγελίες Hot Line</span>
  <div class="dropdown-content" >
    <p onclick="openHot()" >Ανοικτές</p>
    <p onclick="closedHot()">Κλειστές</p>
    <p onclick="reportedHot()">Αναφερόμενες</p>
    
  </div>
</div>

<div class="dropdown">
  <span class="dropbtn" style="color: #e9ac09">Καταγγελίες Help Line</span>
  <div class="dropdown-content" >
    <p onclick="openHelp()" >Ανοικτές</p>
    <p onclick="closeHelp()">Κλειστές</p>
    <p onclick="reportedHelp()">Αναφερόμενες</p>
    
  </div>
</div>
           <!--  <a id="" href="/leit/operatorHome.php"" >Αρχική</a>
            <a id="hl" href="#" >View Help Line Complaints</a>
            <a href="/leit/operatorb.php" ;" >View Hot Line Complaints</a> -->
            <a href="/leit/operatorop.php" style="font-size: 16px;">Λειτουργοί</a>
           <!--  <a href="#">Reports</a>
            <a href="#">Roles <span class="header-new-feature">new</span></a> -->
        </nav>


        <div class="header-user-menu">
            <img src="person.png" alt="User Image"/>

            <ul>

                <li><a href="/changepswd/change_password.php">Αλλαγή Κωδικού</a></li>
              <!--   <li><a href="index - Copy.html">Create Form</a></li> -->
              <li><a href="insertOperator.php" class="highlight">Προσθήκη Λειτουργού</a></li>
                <li><a href="logoutses.php" class="highlight">Έξοδος</a></li>
            </ul>
        </div>

    </div>

</header>


   <div id="ant">
       
   </div>
    <div id="showData">
        
        
    </div>
    </div>


    <!-- <div>
    
        <button type="button" onclick= " location.href= 'index - Copy.html'  ">Δημιουργία Καταγγελίας</button>        
    </div> -->

</body>





<script>

// function viewHelpLine(){


var myVar = setInterval(function(){ showjson() }, 200);


// }

function post(test) {
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", "viewHomeHelp.php");

            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "koko");
            hiddenField.setAttribute("value", test);

            form.appendChild(hiddenField);


    document.body.appendChild(form);
    form.submit();
}

     function showjson(){
    $(document).ready(function () {
        $.getJSON("empdata.json", function (data) {

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
                if(col[i]!="sended"){
                if (col[i]=="ID"){
                    vali="Κωδικός"
                }
                else if(col[i]=="DateTime"){
                    vali="Ημερομηνία Καταγγελίας"
                }
                // th.innerHTML = col[i];
                th.innerHTML = vali;
                // th.innerHTML = col[i];
                tr.appendChild(th);
            }
            }

            // ADD JSON DATA TO THE TABLE AS ROWS.
            for (var i = 0; i < arrItems.length; i++) {

                tr = table.insertRow(-1);

                for (var j = 0; j < col.length; j++) {
                    var tabCell = tr.insertCell(-1);
                    if(arrItems[i][col[j]]=="r" || arrItems[i][col[j]]=="y"){
                        var p="";
                    }
                    else if(j%3==1){
                        var date= new Date(arrItems[i][col[j]]);
                        var datee=date.getDate();
                        var day=getTheDay(date.getDay());
                        var month=getTheMonth(date.getMonth());
                        
                         var hours=date.getHours();
                        var minutes=date.getMinutes();
                        var year=date.getFullYear();
                        var p=day+" "+datee+" "+month+" "+year+" "+hours+":"+minutes;
                    }
                    else{
                        var p=arrItems[i][col[j]];
                    }
                    tabCell.innerHTML = p;

                }





                //tr.setAttribute('onclick', "(function(){ alert('click'); })()");
                tr.addEventListener("click", (function(){ 

                      
                       var test = table.rows[$(this).index()].cells[0].innerHTML;
                        post(test);
                     
                 
                
            }));
                


                
            }

          

            // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
            var divContainer = document.getElementById("showData");
            divContainer.innerHTML = "";
            divContainer.appendChild(table);


        });
    });
}





// function viewHotLine(){
// // window.clearInterval(id);


// // window.setInterval(showjsonn, 2000);
//  // document.getElementById("showData").id="showDatab";
// setInterval(function(){ showjsonn() }, 2000);
// }

// // function post(test) {
// //     method = "post"; // Set method to post by default if not specified.

// //     // The rest of this code assumes you are not using a library.
// //     // It can be made less wordy if you use one.
// //     var form = document.createElement("form");
// //     form.setAttribute("method", method);
// //     form.setAttribute("action", "showHLDetails.php");

// //             var hiddenField = document.createElement("input");
// //             hiddenField.setAttribute("type", "hidden");
// //             hiddenField.setAttribute("name", "koko");
// //             hiddenField.setAttribute("value", test);

// //             form.appendChild(hiddenField);


// //     document.body.appendChild(form);
// //     form.submit();
// // }

//      function showjsonn(){
//     $(document).ready(function () {
//         $.getJSON("empdatahotline.json", function (data) {

//             var arrItems = [];      // THE ARRAY TO STORE JSON ITEMS.
//             $.each(data, function (index, value) {
//                 arrItems.push(value);       // PUSH THE VALUES INSIDE THE ARRAY.
//             });

//             // EXTRACT VALUE FOR TABLE HEADER.
//             var col = [];
//             for (var i = 0; i < arrItems.length; i++) {
//                 for (var key in arrItems[i]) {
//                     if (col.indexOf(key) === -1) {
//                         col.push(key);
//                     }
//                 }
//             }


//             // CREATE DYNAMIC TABLE.
//             var table = document.createElement("table");
//          //  table.id='tab';

//             // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

//             var tr = table.insertRow(-1);                   // TABLE ROW.

//             for (var i = 0; i < col.length; i++) {
//                 var th = document.createElement("th");      // TABLE HEADER.
//                 th.innerHTML = col[i];
//                 tr.appendChild(th);
//             }

//             // ADD JSON DATA TO THE TABLE AS ROWS.
//             for (var i = 0; i < arrItems.length; i++) {

//                 tr = table.insertRow(-1);

//                 for (var j = 0; j < col.length; j++) {
//                     var tabCell = tr.insertCell(-1);
//                     tabCell.innerHTML = arrItems[i][col[j]];

//                 }





//                 //tr.setAttribute('onclick', "(function(){ alert('click'); })()");
//                 tr.addEventListener("click", (function(){ 

                      
//                        var test = table.rows[$(this).index()].cells[0].innerHTML;
//                         post(test);
                     
                 
                
//             }));
                


                
//             }

          

//             // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
//             var divContainer = document.getElementById("showDatab");
//             divContainer.innerHTML = "";
//             divContainer.appendChild(table);


//         });
//     });
// }





</script>


<script type="text/javascript">
    function   openHot(){
         location.href = "operatorb.php";

    }
     function   reportedHot(){
         location.href = "operatorbreported.php";

    }
   function   closedHot(){
         location.href = "operatorbclosed.php";

    }
     
     function   openHelp(){
         location.href = "operator.php";

    }
     function   reportedHelp(){
         location.href = "operatorreported.php";

    }
    function   closeHelp(){
         location.href = "operatorclosed.php";

    }

//     function getTheDay(str){
//         if (str==1){
//             return "Δευτέρα";
//         }
//         else if(str==2){
//             return "Τρίτη"
//         }
//         else if(str==3){
//             return "Τετάρτη"
//         }
//         else if(str==4){
//             return "Πέμπτη"
//         }
//         else if(str==5){
//             return "Παρασκυή"
//         }
//         else if(str==6){
//             return "Σάββατο"
//         }
//         else if(str==7){
//             return "Κυριακή"
//         }
//     }

// function getTheMonth(str){
//     if(str==0){
//         return "Ιαννουαρίου";
//     }
//     else if(str==1){
//         return "φεβρουαρίου";
//     }
//     else if(str==2){
//         return "Μαρτίου";
//     }
//     else if(str==3){
//         return "Απριλίου";
//     }
//     else if(str==4){
//         return "Μαίου";
//     }
//     else if(str==5){
//         return "Ιουνίου";
//     }
//     else if(str==6){
//         return "Ιουλίου";
//     }
//     else if(str==7){
//         return "Αυγούστου";
//     }
//     else if(str==8){
//         return "Σεπτεμβρίου";
//     }
//     else if(str==9){
//         return "Οκτομβρίου";
//     }
//     else if(str==10){
//         return "Νοεμβρίου";
//     }
//     else if(str==11){
//         return "Δεκεμβρίου";
//     }
// }
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
