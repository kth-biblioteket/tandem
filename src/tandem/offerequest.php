<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>My Tandem Profile</title>
</head>
<body>

<?php
$page = "members" ;
include "logincheck.php" ;
if(!$user){
	header("location: modifyprofile.php") ;
}

include "alphabet.php" ;
if($_SESSION['kth_id'])
{
	echo getoffer();
?>

<?php 

}

include "menuinclude.php" ; 

function howManySpeak($langid)
{
	global $con;
    // 2014-10-29 CEWI Lagt till: (...) AND lastloginyear = '$year' AND last_login > current_date - interval 6 month
	$sql = "SELECT COUNT(id) FROM tll_users WHERE (lang_have_1 = '$langid' OR lang_have_2 = '$langid') AND last_login > current_date - interval 6 month " ;
	$result = mysqli_query($con, $sql) ;
	$row = mysqli_fetch_row($result) ;
	$k = $row[0] ;
	return $k ;
}

function howManyWant($langid)
{
	global $con;
    // 2014-10-29 CEWI Lagt till: (...) AND lastloginyear = '$year' AND last_login > current_date - interval 6 month
	$sql = "SELECT COUNT(id) FROM tll_users WHERE (lang_want_1 = '$langid' OR lang_want_2 = '$langid') AND last_login > current_date - interval 6 month " ;
	$result = mysqli_query($con, $sql) ;
	$row = mysqli_fetch_row($result) ;
	$k = $row[0] ;
	return $k ;	
}
function getoffer() {
	$ch = curl_init();
	$url = $tandemapi . 'offerrequest';
	error_log("getoffer" . $url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		$json = '"error":{"Error connecting to loginserver."}' . curl_errno($ch);
		$error = $json;
		curl_close($ch);
		return $error;
	}
	curl_close($ch);
	return $response;
}




?>


</body>
</html>


