<?php
session_start();
require_once "config.php";
  

$con = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE );
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
  }
 

 if(isset($_POST['saveprofile']))
 {
	   
  
  
   	$kth_id 			= $_POST['kth_i_d'];
  	$first_name 		= trim($_POST['first_name'])  ;
  	$last_name  		= trim($_POST['last_name'])  ;
 	$birth_date 		= trim($_POST['birth_date']) ;
 	$gender 			= trim($_POST['gender']) ;
	if($gender == 'Female') {
		$tinyGender = 1 ;
	} else
	if($gender == 'Male') 
		{
			$tinyGender = 2 ;
		}
	else  
		{
			$tinyGender = 3 ;
		}
	
	$nationality 		= trim($_POST['nationality']) ;
	$email 				= trim($_POST['email']) ;
	$cell_phone 		= trim($_POST['cell_phone']) ;
	$home_phone 		= trim($_POST['home_phone']) ;
	$lang_have_1 		= trim($_POST['lang_have_1']) ;
	$lang_have_2 		= trim($_POST['lang_have_2']) ;
	$lang_want_1 		= trim($_POST['lang_want_1']) ;
	$lang_want_2 		= trim($_POST['lang_want_2']) ;
	$campus 			= trim($_POST['campus']) ;
	$interests 			= trim($_POST['interests']) ;
	$comments 			= trim($_POST['comments']) ;
	if(isset($_POST['busy'])) {
		$busy 				= trim($_POST['busy']) ;
	}
  	
	if(isset($busy)) {
		if ($busy == "busy") {
			$busySign = "t" ; 
		}
	} else { 
		$busySign = "f";
	}

	
	$loginyear 	= date("Y") ;
	$loginmonth = date("m") ;
	$loginday 	= date("d") ;
	$loginTime 	= date("H:i:s");
	$lastlogin = $loginyear."-".$loginmonth."-".$loginday." ".$loginTime ;
	
    $sql 	= "SELECT * FROM tll_users WHERE id = '".$kth_id."'" ;
	//$res  	= mysql_query($sql);
	$res  	= mysqli_query($con, $sql);
	//$x 		= mysql_num_rows($res) ;
	$x 		= mysqli_num_rows($res) ;
	
	
	/*
	$logfile = fopen("tandem.log", "a+");
	$currenttime = date('Y-m-d H:i:s');
	fwrite( $logfile, $currenttime . " interests: " . $interests . PHP_EOL);
	fwrite( $logfile, $currenttime . " comments: " . $comments . PHP_EOL);
	fwrite( $logfile, PHP_EOL);
	*/
	
	//THOLIND 170215 
	//se till att escapea textfälten, mysql_real_escape_string()
	
	/*
	$interests = mysql_real_escape_string($interests);
	$comments = mysql_real_escape_string($comments);
	$first_name = mysql_real_escape_string($first_name);
	$last_name = mysql_real_escape_string($last_name);
	$email = mysql_real_escape_string($email);
	$cell_phone = mysql_real_escape_string($cell_phone);
	$home_phone = mysql_real_escape_string($home_phone);
	$campus = mysql_real_escape_string($campus);
	*/
	$interests = mysqli_real_escape_string($con, $interests);
	$comments = mysqli_real_escape_string($con, $comments);
	$first_name = mysqli_real_escape_string($con, $first_name);
	$last_name = mysqli_real_escape_string($con, $last_name);
	$email = mysqli_real_escape_string($con, $email);
	$cell_phone = mysqli_real_escape_string($con, $cell_phone);
	$home_phone = mysqli_real_escape_string($con, $home_phone);
	$campus = mysqli_real_escape_string($con, $campus);
	
	/*
	fwrite( $logfile, $currenttime . "after escape interests: " . $interests . PHP_EOL);
	fwrite( $logfile, $currenttime . "after escape comments: " . $comments . PHP_EOL);
	fwrite( $logfile, PHP_EOL);
	fclose( $logfile );
	*/
	
	if($x === "" || $x === 0 ) 
	{
 		$sql = "INSERT INTO tll_users (id, first_name, last_name, birth_date, gender, nationality, email, cell_phone, home_phone, lang_have_1, lang_have_2, 
				lang_want_1, lang_want_2, campus, interests, comments, lastloginyear, lastloginmonth, reg_date, last_login, busy  ) 
				VALUES ('$kth_id', '$first_name', '$last_name', '$birth_date' , '$tinyGender', '$nationality', '$email', '$cell_phone', '$home_phone', '$lang_have_1',
				 '$lang_have_2', '$lang_want_1', '$lang_want_2', '$campus', '$interests', '$comments', '$loginyear', '$loginmonth', '$lastlogin' , '$lastlogin' , '$busySign')" ;
				  
		 //$res  	= mysql_query($sql) ;
		 $res  	= mysqli_query($con, $sql) ;
	} 
	else
	{
		 
    		$sql = "UPDATE tll_users SET 
				
				first_name 	= '$first_name' ,
				last_name 	= '$last_name' ,
				birth_date 	= '$birth_date' ,
				gender 		= '$tinyGender' ,
				nationality = '$nationality' ,
				email 		= '$email' ,
				cell_phone 	= '$cell_phone' ,
				home_phone 	= '$home_phone' ,
				lang_have_1 = '$lang_have_1' ,
				lang_have_2 = '$lang_have_2' ,
				lang_want_1 = '$lang_want_1' ,
				lang_want_2 = '$lang_want_2' ,
				campus 		= '$campus' ,
				interests 	= '$interests' ,
				comments 	= '$comments' ,
				busy 		= '$busySign'  
				WHERE 
				 id 			= '$kth_id'  " ;
		 //$res  	= mysql_query($sql) ;
		 $res  	= mysqli_query($con, $sql) ;
		 
		 
	} 
	updateLanguage($lang_have_1) ;
 	 
  }


function updateLanguage($lang)
{
	global $con;
	$sqlLangCheck 	= "SELECT * FROM `tll_languages`  WHERE id = '$lang' " ;
	//$res  			= mysql_query($sqlLangCheck) ;
	$res  			= mysqli_query($con, $sqlLangCheck) ;
	//$langrow 		= mysql_fetch_assoc($res) ;
	$langrow 		= mysqli_fetch_assoc($res) ;
	if($langrow['tll'] === "0")
	{
		//mysql_query("UPDATE  `tll_languages` SET tll = '1'  WHERE id = '$lang' ");
		mysqli_query($con, "UPDATE  `tll_languages` SET tll = '1'  WHERE id = '$lang' ");	
	}

}

mysqli_close($con) ;
header("location: $app_url") ;

 