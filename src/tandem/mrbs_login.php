<?php
//Den här filen ligger i tandemmappen för att tandemmappen är auktoriserad att logga in via CAS(anmäl andra mappar(apps.lib.kth.se generellt?) till ITA?)

// Timezone
date_default_timezone_set("Europe/Stockholm");

if (!empty($_GET["formlanguage"])) {
	$formlanguage = $_GET["formlanguage"];
} else {
	$formlanguage = "en";
}
if (!empty($_GET["returl"])) {
	$returl = $_GET["returl"];
} else {
	$returl = "/";
}
$returl = str_replace('&','ampersand',$returl);

if(isset($_GET['sessionname'])) {
	$sessionname_in_url = "sessionname=" . $_GET['sessionname'];
	$sessionname = $_GET['sessionname'];
	session_name($sessionname);
}

if(isset($_GET['Action'])) {
	$action = $_GET['Action'];
}

if(isset($_GET['NewUserName'])) {
	$NewUserName = $_GET['NewUserName'];
}
	
$_SERVER['HTTP_X_FORWARDED_HOST'] = "apps.lib.kth.se";
$_SERVER['REQUEST_URI']=html_entity_decode("/tandem/mrbs_login.php?sessionname=" . $sessionname . "&formlanguage=" . $formlanguage . "&returl=" . $returl);

include_once('CAS.php');
//phpCAS::setDebug('/tmp/phpCAS.log');
phpCAS::client(CAS_VERSION_2_0,'login.kth.se',443,'', false);
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();

if(isset($_REQUEST['logout'])) 
{ 
	$_SESSION = array();
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
    phpCAS::logout() ;
    $returl = str_replace('ampersand','&',$returl);
	header("location: " . $returl);
} else {
	$attributes = "";
	$hasattrib = "false";
	$casUser = phpCAS::getUser();

	if($casUser) 
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['kth_id']  	= $casUser ; 	// $kthid->user_name;
        $userid 				= $_SESSION['kth_id']  ;
		$returl = str_replace('ampersand','&',$returl);
        header("location: " . $returl);
        
	}
}
