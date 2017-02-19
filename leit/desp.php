<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user'])) {

?>

<html>
<head>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
          <link rel="stylesheet" href="style.css">


    <div id="auto">
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


        xmlhttp.open("GET","createjson.php",true);
        xmlhttp.send();
    }

</script>

</div>  

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
}

#btn{
    background-color: red;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
   
}
     
     
</style>
</head>

<body>

      
    <div id="showData"></div>
        <div>
        <button type="button" onclick= " location.href= 'index - Copy.html'  ">Δημιουργία Καταγγελίας</button>        
    </div>

   <form action="logoutses.php">
    <div>
        <button type="submit"  id="btn" >log out</button>        
    </div>
    </form>
</body>
<script>
window.setInterval(showjson, 2000);
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
                //tr.setAttribute('onclick', "(function(){ alert('click'); })()");
                tr.addEventListener("click", (function(){ window.open ('http://www.facebook.com'); }));
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
            window.location.href='http://localhost/login/index.html';
            </SCRIPT>");
}

exit();
?>

