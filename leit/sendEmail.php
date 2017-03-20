<?php

session_start();

$mess= nl2br("Κωδικός Καταγγελίας: ".$_SESSION["id"]."\nΗμερομηνία και Ώρα Καταγγελίας: ".$_SESSION["datetime"]."\nΚαταγγελία για: ".$_SESSION["complaintFor"]."\nΔιεύθυνση ιστοσελίδας(URL): ".$_SESSION["WebsiteName"]."\nΌνομα Εφαρμογής: "
	.$_SESSION["platformname"]."\nΕίδος Καταγγελίας: ".$_SESSION["typeofcomplaint"]."\nΛεπτομέρειες :".$_SESSION["details"]."\nE-Mail: ".
	$_SESSION["email"]."\nΟνομα: ".$_SESSION["name"]."\nΕπίθετο: ".$_SESSION["surname"]."\nΕτών: ".$_SESSION["age"]."\nΦύλο: ". $_SESSION["sex"]);

//$id=$_SESSION["id"];


// $ael="αεο ολε";
// $mess="=?UTF-8?B?".base64_encode($ael)."?=";

//echo $mess;
 $to= "dchris03@cs.ucy.ac.cy";
 // $to= "akonna01@cs.ucy.ac.cy";
 $sub ="Καταγγελία";
  $subject ="=?UTF-8?B?".base64_encode($sub)."?=";
 //  $message="=?UTF-8?B?".base64_encode($mess)."?=";
// //$from ="jacksparw2014@gmail.com";
// $from_user="Cyberethics";
// $from_email="aellaa";
// $headers = "From: $from_user <$from_email>\r\n". 
//                "MIME-Version: 1.0" . "\r\n" . 
//                "Content-type: text/html; charset=UTF-8" . "\r\n";
// if(!(mail($to, $sub,$mess))) {
//         echo 'Email on the way';
//     }
// else echo"niououuuuuu";
//$str = mb_convert_encoding($mess, "UTF-8");



// function mail_utf8($to, $subject = '(No subject)', $message = '')
//    { 
//      // $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
//       $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $from_user="Cyberethics";
     
      $from_email="bhj";
           $headers = "From: $from_user <$from_email>\r\n"."Content-type: text/html; charset=UTF-8"; 
              

   //   return mail($to, $subject, $message, $headers); 
   // }


if (mail($to, $subject, $mess, $headers)){


    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Email has sent Successfully')
            window.location.href='/leit/desp.php';
            </SCRIPT>");

} 
   // }

// echo $str;
?>