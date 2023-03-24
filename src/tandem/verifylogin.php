<?php
//http://www.kth.se/ece/avdelningen-for-bibliotekstjanster-sprak-och-kommunikation/sprak-och-kommunikation/tandem/admin/
/**
 * Is this application in dev mode (local) or live mode?
 */
 
$_SERVER['HTTP_X_FORWARDED_HOST'] = "www.kth.se";
$_SERVER['REQUEST_URI']="/ece/avdelningen-for-bibliotekstjanster-sprak-och-kommunikation/sprak-och-kommunikation/tandem/admin/login.php";
  
include_once('CAS.php');
include_once('dbconnect.php');
phpCAS::setDebug();
phpCAS::proxy(CAS_VERSION_2_0,"login.kth.se",443,'/cas');
//phpCAS::client(CAS_VERSION_2_0, "login.kth.se",443, ''); 
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();


if(isset($_REQUEST['logout'])) 
{
	if (!isset($_SESSION)) {
		if (!isset($_SESSION)) {
			session_start();
		}
	}
	session_destroy() ;
	phpCAS::logout();
}  
 
$casUser = phpCAS::getUser();
//print_r($_SESSION, true);
if($casUser) 
{
	session_start() ;
 	$_SESSION['kth_id']  	= $casUser ; 	// $kthid->user_name;
	$userid 				= $_SESSION['kth_id']  ;
	registerTandemLogin($userid) ;
	//header("location: http://www.kth.se/xyz/nasim/admin/modifyprofile.php") ;		
	//header("location: http://www.kth.se/xyz/nasim/admin/index.php") ;
	error_log('=================== here');
	header("location: http://dev.tandem.kth.se/index.php") ;
}


function registerTandemLogin($userid)
{
	$loginyear 	= date("Y") ;
	$loginmonth = date("m") ;
	$loginday 	= date("d") ;
	$loginTime 	= date("H:i:s");  
	
	$sql = "INSERT INTO  tll_logincounts (userid, loginyear, loginmonth, loginday, logintime) 
				VALUES ('$userid' , '$loginyear', '$loginmonth', '$loginday', '$loginTime')" ;
	$res = mysql_query($sql) ;
	
	$sqlCheck = "select * from tll_users where id = '$userid' " ;
	$resultCheck = mysql_query($sqlCheck) ;
	$rowUser 	= mysql_fetch_assoc($resultCheck) ;
	if($rowUser){
	$lastlogin = $loginyear."-".$loginmonth."-".$loginday." ".$loginTime ;
	$sql = "UPDATE tll_users SET last_login = '$lastlogin', lastloginyear = '$loginyear' ,  lastloginmonth = '$loginmonth'  WHERE id = '$userid' " ;
	$res = mysql_query($sql) ;
	}else{
		$sql = "INSERT INTO tll_users (id, lastloginyear, lastloginmonth, reg_date, last_login) 
				VALUES ('$userid', '$loginyear', '$loginmonth' , '$lastlogin', '$lastlogin')  " ;
		$res = mysql_query($sql) ;
	}
	
}