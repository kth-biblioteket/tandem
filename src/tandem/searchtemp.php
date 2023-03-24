 <?php
$page = "members" ;
include "logincheck.php" ;
if(isset($user)){
	if(!$user){
		header("location: modifyprofile.php") ;
	}
}
require "getquery.php" ; 
$lang_want 	= "";
$lang_have 	= "";
if(isset($_POST['search']))
{
  	$lang_want 	= $_POST['lang_want'] ;
  	$lang_have 	= $_POST['lang_have'] ;
}

header("location: search.php?search=search&lang_want=$lang_want&lang_have=$lang_have") ;
?>


