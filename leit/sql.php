<?php

	try {
	    	$conn = new PDO("mysql:host=localhost;dbname=cyberethics", "root", "1234",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    	// set the PDO error mode to exception
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	//echo "Connected successfully"; 
	    }
		catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage();
	    }
        


    
       

        if(  empty($_POST['date1'])  &&  !empty($_POST['date2'])    ){
        	$startTime = "1000-01-01";
        	$endTime = $_POST['date2'];
        }

        else if(  !empty($_POST['date1'])  &&  empty($_POST['date2'])    ){
			$startTime=$_POST['date1'];
            $endTime = "9999-12-31";        
        }
        else if(  empty($_POST['date1'])  &&  empty($_POST['date2'])    ){
        	$startTime = "1000-01-01";
        	$endTime = "9999-12-31";
        }
        else {
        	$startTime=$_POST['date1'];
        	$endTime = $_POST['date2'];
        }





 

	    //Anoiktes ipotheseis Helpline

	    $sql = "SELECT COUNT(`ID`) FROM helplinecomplaint WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$OpenHelpline = $result;
	    }
	    else{
	    	$OpenHelpline = 0;
	    }

	    ///////////////////////////////////////////////////////////////////

	    //kleistes helpline ipotheseis

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelpline = $result;
	    }
	    else{
	    	$ResolvedHelpline = 0;
	    }


	    /////////////////////////////////////////////////////////////////////

	    //OtherOperatorHelpline

	    $sql = "SELECT COUNT(`ID`) FROM otheroperatorcomplaint WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$OtherOperatorHelpline = $result;
	    }
	    else{
	    	$OtherOperatorHelpline = 0;
	    }

	    ////////////////////////////////////////////////////////////////////

	    //Unresolved Hotline

	     $sql = "SELECT COUNT(`ID`) FROM hotlinecomplaint WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$UnresolvedHotline = $result;
	    }
	    else{
	    	$UnresolvedHotline = 0;
	    }


	    ///////////////////////////////////////////////////////////////////////

	    //ResolvedHotline

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotline = $result;
	    }
	    else{
	    	$ResolvedHotline = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////

	    //UnresolvedHelplineAndHotline

	    $UnresolvedHelplineAndHotline = $UnresolvedHotline + $OpenHelpline;

	    ///////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineAndHotline

	    $ResolvedHelplineAndHotline = $ResolvedHotline + $ResolvedHelpline;


	    ////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFromWebsite

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `sended` = 'w';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFromWebsite = $result;
	    }
	    else{
	    	$ResolvedHotlineFromWebsite = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFromApp

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `sended` = 's';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFromApp = $result;
	    }
	    else{
	    	$ResolvedHotlineFromApp = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFromPhoneCall

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `sended` = 'p';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFromPhoneCall = $result;
	    }
	    else{
	    	$ResolvedHotlineFromPhoneCall = 0;
	    }

	     //////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFromChat

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `sended` = 'c';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFromChat = $result;
	    }
	    else{
	    	$ResolvedHotlineFromChat = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFromEmail

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `sended` = 'm';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFromEmail = $result;
	    }
	    else{
	    	$ResolvedHotlineFromEmail = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFromWebsite

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `sended` = 'w';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFromWebsite = $result;
	    }
	    else{
	    	$ResolvedHelplineFromWebsite = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFromApp

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `sended` = 's';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFromApp = $result;
	    }
	    else{
	    	$ResolvedHelplineFromApp = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFromChat

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `sended` = 'c';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFromChat = $result;
	    }
	    else{
	    	$ResolvedHelplineFromChat = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFromPhoneCall

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `sended` = 'p';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFromPhoneCall = $result;
	    }
	    else{
	    	$ResolvedHelplineFromPhoneCall = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFromEmail

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `sended` = 'm';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFromEmail = $result;
	    }
	    else{
	    	$ResolvedHelplineFromEmail = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineUnder18

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Age` >= 10 AND `Age` < 18;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineUnder18 = $result;
	    }
	    else{
	    	$ResolvedHotlineUnder18 = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotline18_30

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Age` >= 18 AND `Age` < 30;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotline18_30 = $result;
	    }
	    else{
	    	$ResolvedHotline18_30 = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotline30_50

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Age` >= 30 AND `Age` < 50;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotline30_50 = $result;
	    }
	    else{
	    	$ResolvedHotline30_50 = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineOver50

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Age` >= 50 AND `Age` < 100;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineOver50 = $result;
	    }
	    else{
	    	$ResolvedHotlineOver50 = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineUnder18

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Age` >= 10 AND `Age` < 18;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineUnder18 = $result;
	    }
	    else{
	    	$ResolvedHelplineUnder18 = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////

	    //ResolvedHelpline18_30

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Age` >= 18 AND `Age` < 30;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelpline18_30 = $result;
	    }
	    else{
	    	$ResolvedHelpline18_30 = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////

	    //ResolvedHelpline30_50

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Age` >= 30 AND `Age` < 50;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelpline30_50 = $result;
	    }
	    else{
	    	$ResolvedHelpline30_50 = 0;
	    }

	    //////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineOver50

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Age` >= 50 AND `Age` < 100;";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineOver50 = $result;
	    }
	    else{
	    	$ResolvedHelplineOver50 = 0;
	    }

	    /////////////////////////////////////////////////////////////////

	    //ResolvedHotlineChildPornography

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `TypeOfComplaint` = 'Παιδική Πορνογραφία';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineChildPornography = $result;
	    }
	    else{
	    	$ResolvedHotlineChildPornography = 0;
	    }

	    ///////////////////////////////////////////////////////////////

	    //ResolvedHotlineRacicm

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `TypeOfComplaint` = 'Ρατσισμός/Ξενοφοβία';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineRacicm = $result;
	    }
	    else{
	    	$ResolvedHotlineRacicm = 0;
	    }

	    /////////////////////////////////////////////////////////////

	    //ResolvedHotlineHacking

	     $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `TypeOfComplaint` = 'Hacking';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineHacking = $result;
	    }
	    else{
	    	$ResolvedHotlineHacking = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineChildPornography

	     $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Παιδική Πορνογραφία';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineChildPornography = $result;
	    }
	    else{
	    	$ResolvedHelplineChildPornography = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineRacicm

	     $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Ρατσισμός/Ξενοφοβία';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineRacicm = $result;
	    }
	    else{
	    	$ResolvedHelplineRacicm = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineHacking

	     $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Hacking';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineHacking = $result;
	    }
	    else{
	    	$ResolvedHelplineHacking = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineIdentityTheft

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Identity Theft(e.g. fake profile)';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineIdentityTheft = $result;
	    }
	    else{
	    	$ResolvedHelplineIdentityTheft = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineChildGrooming

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Grooming';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineChildGrooming = $result;
	    }
	    else{
	    	$ResolvedHelplineChildGrooming = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplinePhising

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Εμπορικοί Κίνδυνοι/Απειλές (π.χ. Phishing)';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplinePhising = $result;
	    }
	    else{
	    	$ResolvedHelplinePhising = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineInternetAddiction

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Εθισμός Στο Διαδίκτυο';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineInternetAddiction = $result;
	    }
	    else{
	    	$ResolvedHelplineInternetAddiction = 0;
	    }

	    /////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineSpam

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Ανεπιθύμητη Αλληλογραφία';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineSpam = $result;
	    }
	    else{
	    	$ResolvedHelplineSpam = 0;
	    }


	     /////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineSexualharasment

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `TypeOfComplaint` = 'Σεξουαλική Παρενόχληση';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineSexualHarrasment = $result;
	    }
	    else{
	    	$ResolvedHelplineSexualHarrasment = 0;
	    }
	    
	    /////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineMale

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Sex` = 'Α';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineMale = $result;
	    }
	    else{
	    	$ResolvedHotlineMale = 0;
	    }

	    //////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHotlineFamale

	    $sql = "SELECT COUNT(`ID`) FROM sendedHotline WHERE `complaintdate` >= '$startTime' AND `complaintdate`<= '$endTime' AND `Sex` = 'Γ';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHotlineFemale = $result;
	    }
	    else{
	    	$ResolvedHotlineFemale = 0;
	    }

	    ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineFemale

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Sex` = 'Γ';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineFemale = $result;
	    }
	    else{
	    	$ResolvedHelplineFemale = 0;
	    }


	     ///////////////////////////////////////////////////////////////////////////////////

	    //ResolvedHelplineMale

	    $sql = "SELECT COUNT(`ID`) FROM closedHelpline WHERE `DateTime` >= '$startTime' AND `DateTime`<= '$endTime' AND `Sex` = 'Α';";

	    $query = $conn->query($sql);

	    if($result = $query->fetchColumn()){
	    	$ResolvedHelplineMale = $result;
	    }
	    else{
	    	$ResolvedHelplineMale = 0;
	    }

	    ////////////////////////////////////////////////////////////////////////////////////
	    ////////////////////////////////////////////////////////////////////////////////////

	    //print the results

	    $myfile = fopen("Stats_" . date("Y-m-d") . ".csv", "w");

	    $response = array();
	    $posts = array();


	   $title="Hello";
		$url="World" ;

		$post0[] = array('1'=> "Open Helpline Reports",
						 '2'=> "Resolved Helpline Reports",
						 '3'=> "Reports Sent Outside",
						 '4'=> "Unresolved Hotline Reports",
						 '5'=> "Resolved Hotline Reports",
						 '6'=> "All Unresolved Reports",
						 '7'=> "All Resolved Reprots",
						 '8'=> "Hotline Reports From Website",
						 '9'=> "Hotline Reports From App",
						 '10'=> "Hotline Reports From Phone Call",
						 '11'=> "Hotline Reports From Chat",
						 '12'=> "Hotline Reports From Email",
						 '13'=> "Helpline Reports From Website",
						 '14'=> "Helpline Reports From App",
						 '15'=> "Helpline Reports From Chat",
						 '16'=> "Helpline Reports From PhoneCall",
						 '17'=> "Helpline Reports From Email",
						 '18'=> "Hotline Reports 18-",
						 '19'=> "Hotline Reports 18-30",
						 '20'=> "Hotline Reports 30-50",
						 '21'=> "Hotline Reports 50+",
						 '22'=> "Helpline Reports 18-",
						 '23'=> "Helpline Reports 18-30",
						 '24'=> "Helpline Reports 30-50",
						 '25'=> "Helpline Reports 50+",
						 '26'=> "Hotline Reports For Child Pornography",
						 '27'=> "Hotline Reports For Racicm / Xenophobia",
						 '28'=> "Hotline Reports For Hacking",
						 '29'=> "Helpline Reports For Child Pornography",
						 '30'=> "Helpline Reports For Racicm / Xenophobia",
						 '31'=>'Helpline Reports For Hacking',
						'32'=>'Helpline Reports For Identity Theft',
						'33'=>'Helpline Reports For Child Grooming',
						'34'=>'Helpline Reports For Phising',
						'35'=>'Helpline Reports For Internet Addiction',
						'36'=>'Helpline Reports For Spam',
						'41'=>'Helpline Reports For Sexual Harrasment',
						'37'=>'Hotline Reports From Males',
						'38'=>'Hotline Reports From Females',
						'39'=>'Helpline Reports From Males',
						'40'=>'Helpline Reports From Females'

						 );

		$posts[] = array('1'=> "$OpenHelpline",
						'2'=>"$ResolvedHelpline",
						'3'=>"$OtherOperatorHelpline",
						'4'=>"$UnresolvedHotline",
						'5'=>"$ResolvedHotline",
						'6'=>"$UnresolvedHelplineAndHotline",
						'7'=>"$ResolvedHelplineAndHotline",
						'8'=>"$ResolvedHotlineFromWebsite",
						'9'=>"$ResolvedHotlineFromApp",
						'10'=>"$ResolvedHotlineFromPhoneCall",
						'11'=>"$ResolvedHotlineFromChat",
						'12'=>"$ResolvedHotlineFromEmail",
						'13'=>"$ResolvedHelplineFromWebsite",
						'14'=>"$ResolvedHelplineFromApp",
						'15'=>"$ResolvedHelplineFromChat",
						'16'=>"$ResolvedHelplineFromPhoneCall",
						'17'=>"$ResolvedHelplineFromEmail",
						'18'=>"$ResolvedHotlineUnder18",
						'19'=>"$ResolvedHotline18_30",
						'20'=>"$ResolvedHotline30_50",
						'21'=>"$ResolvedHotlineOver50",
						'22'=>"$ResolvedHelplineUnder18",
						'23'=>"$ResolvedHelpline18_30",
						'24'=>"$ResolvedHelpline30_50",
						'25'=>"$ResolvedHelplineOver50",
						'26'=>"$ResolvedHotlineChildPornography",
						'27'=>"$ResolvedHotlineRacicm",
						'28'=>"$ResolvedHotlineHacking",
						'29'=>"$ResolvedHelplineChildPornography",
						'30'=>"$ResolvedHelplineRacicm",
						'31'=>"$ResolvedHelplineHacking",
						'32'=>"$ResolvedHelplineIdentityTheft",
						'33'=>"$ResolvedHelplineChildGrooming",
						'34'=>"$ResolvedHelplinePhising",
						'35'=>"$ResolvedHelplineInternetAddiction",
						'36'=>"$ResolvedHelplineSpam",
						'41'=>"$ResolvedHelplineSexualHarrasment",
						'37'=>"$ResolvedHotlineMale",
						'38'=>"$ResolvedHotlineFemale",
						'39'=>"$ResolvedHelplineMale",
						'40'=>"$ResolvedHelplineFemale");

		

		$response['posts'] = $posts;

		$fp = fopen('results.json', 'w');
		fwrite($fp, json_encode($response));
		fclose($fp);
		

		foreach ($post0 as $rows) {
		    fputcsv($myfile, $rows);
		}

		foreach ($posts as $fields) {
		    fputcsv($myfile, $fields);
		}

		
		fclose($myfile);
		






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
          <link rel="stylesheet" href="header-user-dropdown.css">

  <style type="text/css">
  	
  	#back:hover {

  		color: #e9ac09;
  		font-size: 30px;
  	}
  </style>
</head>






<div id="olee"></div>
<body >
<header class="header-user-dropdown">

    <div class="header-limiter">
        <h1><a id="back" href="/leit/statisticop.php"><span class="glyphicon glyphicon-chevron-left"></span> Πίσω</a></h1>

        <nav>
<!--             <a href="#" ></a>
 -->            <!-- <a href="#">View Statistics</a> -->
<!--             <a href="#">Live Chat</a>
 -->           <!--  <a href="#">Reports</a>
            <a href="#">Roles <span class="header-new-feature">new</span></a> -->
        </nav>


        <div class="header-user-menu">
            <img src="person.png" alt="User Image"/>

            <ul>
                <li><a href="/changepswd/change_password.php">Αλλαγή Κωδικού</a></li>
<!--                 <li><a href="index - Copy.html">Δημιουργία Φόρμας</a></li>
 -->                <li><a href="logoutses.php" class="highlight">Αποσύνδεση</a></li>
            </ul>
        </div>

    </div>

</header>
<!-- <div class="container">
<form class="well form-horizontal" action="" method="post"  id="contact_form" >
<fieldset>

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Από</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date" type="Date" class="form-control input-md" id="date">
    </div>
  </div>
</div>

<div class="form-group">
  <label class = "col-md-4 control-label" for="Date">Μέχρι</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    <input name ="date" type="Date" class="form-control input-md" id="date">
    </div>
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label"></label>
  	<div class="col-md-4">
<!--                <button type="button"   class="btn btn-default " onclick="fyn()" >Πίσω<span class="glyphicon glyphicon-chevron-left"></span></button>
 -->
<!--     	<button type="submit"  class="btn btn-warning"  >Εμφάνιση Στατιστικών<span class="glyphicon glyphicon-send"></span></button>

  	</div>
</div>
</form>
</fieldset>
</div> --> 


	<div class="container">
		<form class="well form-horizontal" action="" method="post"  id="contact_form" >
		<fieldset>

<!-- Form Name -->
		<legend>Στατιστικά Στοιχεία</legend>

<!-- Text input-->
		<div class="form-group"> 
  			<label class="col-md-4 control-label">Open Helpline Reports</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($OpenHelpline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

<!-- 2-->
		<div class="form-group"> 
  			<label class="col-md-4 control-label">Resolved Helpline Reports</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelpline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

<!--3-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Reports Sent Outside</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($OtherOperatorHelpline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

<!--4-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Unresolved Hotline Reports</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($UnresolvedHotline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>
<!--5-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Resolved Hotline Reports</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--6-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">All Unresolved Reports</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($UnresolvedHelplineAndHotline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--7-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">All Resolved Reprots</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineAndHotline); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--8-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Website</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFromWebsite); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--9-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From App</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFromApp); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--10-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Phone Call</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFromPhoneCall); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--11-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Chat</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFromChat); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--12-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Email</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFromEmail); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--13-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From Website</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFromWebsite); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--14-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From App</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFromApp); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--15-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From Chat</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFromChat); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--16-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From PhoneCall</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFromPhoneCall); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--17-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From Email</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFromEmail); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--18-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports 18-</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineUnder18); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--19-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports 18-30</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotline18_30); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

			<!--20-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports 30-50</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotline30_50); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--21-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports 50+</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineOver50); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--22-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports 18-</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineUnder18); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--23-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports 18-30</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelpline18_30); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--24-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports 30-50</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelpline30_50); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--25-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports 50+</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineOver50); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--26-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports For Child Pornography</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineChildPornography); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--27-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports For Racicm / Xenophobia</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineRacicm); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--28-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports For Hacking</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineHacking); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--29-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Child Pornography</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineChildPornography); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--30-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Racicm / Xenophobia</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineRacicm); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<!--31-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Hacking</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineHacking); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--32-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Identity Theft</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineIdentityTheft); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--33-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Child Grooming</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineChildGrooming); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--34-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Phising</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplinePhising); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--35-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Internet Addiction</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineInternetAddiction); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--36-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Spam</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineSpam); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>

		<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports For Sexual Harrasment</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineSexualHarrasment); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--37-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Males</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineMale); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--38-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Hotline Reports From Females</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHotlineFemale); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--39-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From Males</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineMale); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>


<!--40-->
			<div class="form-group"> 
  			<label class="col-md-4 control-label">Helpline Reports From Females</label>
    		<div class="col-md-4 selectContainer">
    			<div class="input-group">
    				<input name="state"  id="selectidr" class="form-control selectpicker" value=" <?php echo htmlspecialchars($ResolvedHelplineFemale); ?>"  readonly rows="1" ">   
   					</input>
  				</div>
			</div>
		</div>





<p id="demo"></p>


</fieldset>
</form>
</div>



   
    </div><!-- /.container -->
  
</body>


</html>