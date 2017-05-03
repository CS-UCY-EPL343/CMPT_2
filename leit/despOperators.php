<?php
session_start();
//echo $_SESSION["user"];

if (isset($_SESSION['user']) and strcmp("p",$_SESSION['role'])!=0  and strcmp("t",$_SESSION['role'])!=0 and strcmp("g",$_SESSION['role'])!=0 and strcmp("e",$_SESSION['role'])!=0) {
 $role=$_SESSION['role'];

?>


<html>
<head>

<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script> 
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 
<script src="getDate.js"></script>

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
    </style>
    


    
    <script>
    //setTimeout(createjson, 3000);
window.setInterval(createjson, 1000);
     function createjson(){


        var xmlhttp;
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }


        xmlhttp.open("GET","createjsonOperators.php",true);
        xmlhttp.send();
    }

</script>



  <!--   <style>
       table, th, td 
        {
            margin:10px 0;
            border:solid 1px #333;
            padding:2px 4px;
            font:15px Tahoma;
/*          background-color: yellow;
*/
        }
        th {
            font-weight:bold;
                        background-color: yellow;

        }

         tr   {
            background-color: green;
            cursor: pointer;
            color: white;
         }


    </style> -->
</head>

<body>

      

<header class="header-user-dropdown">

    <div class="header-limiter">
        <h1>Λειτουργός <?php echo htmlspecialchars($role); ?></h1>

        <nav>
                    <a href="#" ></a>

            <a href="#" >Προβολή Καταγγελιών</a>
            <!-- <a href="#">View Statistics</a>
            <a href="#">Live Chat</a> -->
           <!--  <a href="#">Reports</a>
            <a href="#">Roles <span class="header-new-feature">new</span></a> -->
        </nav>


        <div class="header-user-menu">
            <img src="person.png" alt="User Image"/>

            <ul>
                 <li><a href="/changepswd/change_password.php">Αλλαγή Κωδικού</a></li>
                <!-- <li><a href="CreateFormHotLine.php">Δημιουργία Φόρμας</a></li> -->
                <li><a href="http://localhost/leit/logoutses.php" class="highlight">Αποσύνδεση</a></li>
            </ul>
        </div>

    </div>

</header>


   <div id="ant">
       
   </div>
    <div id="showData">
        
    </div>

    <!-- <div>
    
        <button type="button" onclick= " location.href= 'index - Copy.html'  ">Δημιουργία Καταγγελίας</button>        
    </div> -->

</body>





<script>

window.setInterval(showjson, 2000);
function post(test) {
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", "showOtherOperatorDetails.php");

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
        $.getJSON("empdataOtherOperator.json", function (data) {

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
                if (col[i]=="ID"){
                    vali="Κωδικός"
                }
                else if(col[i]=="DateTime"){
                    vali="Ημερομηνία Καταγγελίας"
                }
                // th.innerHTML = col[i];
                th.innerHTML = vali;
                tr.appendChild(th);
            }

            // ADD JSON DATA TO THE TABLE AS ROWS.
            for (var i = 0; i < arrItems.length; i++) {

                tr = table.insertRow(-1);

                for (var j = 0; j < col.length; j++) {
                    var tabCell = tr.insertCell(-1);
                         
                    if(j%2==1){
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
                       var p=arrItems[i][col[j]]
                    }

                    tabCell.innerHTML = p;

                }





                //tr.setAttribute('onclick', "(function(){ alert('click'); })()");
                tr.addEventListener("click", (function(){ 

                      
                       var test = table.rows[$(this).index()].cells[0].innerHTML;
                        post(test);
                       // var testsend = test;
                   // document.getElementById("ant").innerHTML = test;
                       // window.location.href = 'showHLDetails.php';
                       //$.post('/leit/showHLDetails.php',{ sendtest : "dafaf" } );
                     

                       // $.ajax({
                       //          type: "POST",
                       //          url: "/leit/showHLDetails.php",
                       //          data:{ 'sendtest':"sdadasa" },
                       //          dataType:'json', 
                       //          success: function(data){
                       //          console.log(data); 
                       //          }
                       //      })
                       // <?php
                       // $_SESSION["test"]= test;
                       // ?>
                       
                        // var fh=fopen("aellara.txt",3);
                        // fwrite(fh, "danakis");

                      //document.getElementById("ant").innerHTML = test;


                       //window.open ('showHLDetails.php'); 
               // <?php
               // $test="aellara";
               //  $_SESSION["complaintid"]= $test;
               // ?>
                 
                
            }));
                


                
            }

          

            // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
            var divContainer = document.getElementById("showData");
            divContainer.innerHTML = "";
            divContainer.appendChild(table);


        });
    });
}

// $(document).ready(function(){
//     $("#tab").hover(function(){
//         $(this).css("background-color", "yellow");
//         }, function(){
//         $(this).css("background-color", "pink");
//     });
// });

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


