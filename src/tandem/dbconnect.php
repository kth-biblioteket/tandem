
<?php
require_once "config.php";
  
  //php 7
$con = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE );
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
  }
//mysql_select_db('tandemlearn');
//mysqli_select_db($con, 'tandemlearn');
 
function getCountryFullName($countryID)
{
	global $con;
	 
	//$res 		= mysql_query("SELECT name_en FROM countries WHERE id = '$countryID'  ");
	//$country 	= mysql_fetch_assoc($res)  ;
	$res 		= mysqli_query($con, "SELECT name_en FROM countries WHERE id = '$countryID'  ");
	$country 	= mysqli_fetch_assoc($res)  ;
	return  $country['name_en'] ;
}

function getLanguageFullName($LanguageID)
{
	global $con;
	//$res 		= mysql_query("SELECT name_en FROM tll_languages WHERE id = '$LanguageID'  ");
	//$language 	= mysql_fetch_assoc($res)  ;
	$res 		= mysqli_query($con, "SELECT name_en FROM tll_languages WHERE id = '$LanguageID'  ");
	$language 	= mysqli_fetch_assoc($res)  ;
	return  $language['name_en'] ;
}



?>