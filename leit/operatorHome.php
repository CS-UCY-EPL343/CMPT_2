<?php
session_start();
//echo $_SESSION["user"];
if (isset($_SESSION['user']) and strcmp("g",$_SESSION['role'])==0) {

?>


<html>
<head>

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








</head>

<body id="bo" >

      

<header class="header-user-dropdown">

    <div class="header-limiter" >
        <h1>Γενικος Λειτουργός</h1>

        <nav>


<div class="dropdown">
  <span class="dropbtn">Καταγγελίες Hot Line</span>
  <div class="dropdown-content" >
    <p onclick="openHot()" >Ανοικτές</p>
    <p onclick="closedHot()">Κλειστές</p>
    <p onclick="reportedHot()">Αναφερόμενες</p>
    
  </div>
</div>

<div class="dropdown">
  <span class="dropbtn">Καταγγελίες Help Line</span>
  <div class="dropdown-content" >
    <p onclick="openHelp()" >Ανοικτές</p>
    <p onclick="closeHelp()">Κλειστές</p>
    <p onclick="reportedHelp()">Αναφερόμενες</p>
    
  </div>
</div>

            <!-- <a href="/leit/operator.php" >View Help Line Complaints</a>
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


  <!--  <div id="ant">
       
   </div> -->
  
    </div>


    <!-- <div>
    
        <button type="button" onclick= " location.href= 'index - Copy.html'  ">Δημιουργία Καταγγελίας</button>        
    </div> -->

</body>
  


 


<script type="text/javascript">
    function   openHot(){
         location.href = "operatorb.php";

    }
   function   closedHot(){
         location.href = "operatorbclosed.php";

    }
     function   reportedHot(){
         location.href = "operatorbreported.php";

    }
     function   reportedHelp(){
         location.href = "operatorreported.php";

    }


     function   openHelp(){
         location.href = "operator.php";

    }
     function   closeHelp(){
         location.href = "operatorclosed.php";

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
