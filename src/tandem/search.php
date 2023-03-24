<!DOCTYPE HTML>
<html>
<head>
<title>My Tandem Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php
$page = "members" ;
include "logincheck.php" ;

$lang_want 	= "" ;
$lang_have 	= "" ;
	
if (isset($user)) {
	if(!$user){
		header("location: modifyprofile.php") ;
	}
}
require "getquery.php" ; 
if(isset($_GET['search']))
{
  	if (isset($_GET['lang_want'])) {
		$lang_want 	= $_GET['lang_want'] ;
	}
	if (isset($_GET['lang_have'])) {
		$lang_have 	= $_GET['lang_have'] ;
	}
		
 	$sqlSearch = "SELECT DISTINCT tll_users . * 
				FROM tll_users
				INNER JOIN tll_logincounts ON tll_users.id = tll_logincounts.userid
				WHERE (lang_want_1 = '$lang_have' OR lang_want_2  = '$lang_have' )
				AND ( lang_have_1= '$lang_want' OR lang_have_2 = '$lang_want' ) AND " ; 

 	$Cyear 		= date("Y") ;
 	$Cmonth 	= date("m") ;
	$sqlSearch.=  getQuery($Cyear, $Cmonth) ;
	$sqlSearch.=	" ORDER BY first_name" ;
  //echo $sqlSearch ;
	$searchResult = mysqli_query($con, $sqlSearch) ;
	
}

if(isset($_SESSION['kth_id']))
{
	 
?>
<h1 class="title">Search:</h1> 
<br>
<form id="fm1" class="large fm-v clearfix" action="https://apps-ref.lib.kth.se/tandem/searchtemp.php" method="post">
 
  <label  class="fl-label">I would like to find someone who can teach me:</label>
 
 <select name="lang_want">
 <option> ----- Select a language -----</option>
	<?php
	if (isset($user)) {
		$usernational =  getLanguageFullName($user['lang_want_1']) ;
	}
	$langSql = "SELECT * FROM tll_languages   WHERE tll = 1  ORDER BY name_en" ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>"  ><?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
</select> 

<label  class="fl-label">..and who wants to learn:</label>
 <select name="lang_have">
 <option> ----- Select a language -----</option>
	<?php
	if (isset($user)) {
		$usernational =  getLanguageFullName($user['lang_have_1']) ;
	}
	$langSql = "SELECT * FROM tll_languages   WHERE tll = 1  ORDER BY name_en" ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>" ><?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
</select> 
 
 <div class="buttons">
	       	  <div class="dataManipulation">
	          	<input name="search" accesskey="l" value="  Search  " tabindex="3" type="submit">
	          </div>
	       </div>
 </form>
 
<p>The search result includes only those who has logged in the last 5 months. 
Please log in frequently to keep active, and do not forget to mark yourself unavailable when you no longer need a partner. Thank you.</p>
<br><br>
You have searched for people can teach you <?php echo  getLanguageFullName($lang_want)  ; ?> and they want to learn <?php echo  getLanguageFullName($lang_have)  ; ?>:
<br><br>
<?php
if (isset($searchResult)){
	if(mysqli_num_rows($searchResult) != 0){

	?>

	<table width="100%" border="1"> 
	 <tr>
		  <td>Name</td>
		  <td class="fontstyles" > Age </td>
		  <td class="fontstyles"> Gender </td>
		  <td class="fontstyles" width="50"> Natioanlity </td>
		  <td class="fontstyles"> Campus </td>
		  <td  class="fontstyles"> Email Address</td>
		</tr>
	<?php 
	while($users = mysqli_fetch_assoc($searchResult))
	{
		 $onlyYear = explode("-", $users['birth_date']) ;
		$onlyYear = $onlyYear[0] ;
		 $age = date("Y") - intval($onlyYear)  ;
	?>
		 <tr>
		  <td><a href="memberprofile.php?act=view&id=<?php echo $users['id']; ?>"><?php echo $users['first_name']." ".$users['last_name'] ; ?></a></td>
		  <td class="fontstyles"> <?php echo " ".$age." " ; ?> </td>
		  <td class="fontstyles"><?php if($users['gender'] == 1) {
                        echo "Female" ;
                      } else
                      if($users['gender'] == 2) {
                        echo "Male" ;
                      }
                      else  
                        {
                          echo "Other/don’t want to mention" ;
                        }  ?></td>
		  <td class="fontstyles"><?php   echo getCountryFullName($users['nationality']) ; ?></td>
		  <td class="fontstyles"><?php if(!$users['campus']){ echo "<i>no campus</i>"; }else{  echo $users['campus'] ; } ?></td>
		  <td style="font-size:9px;"><?php echo $users['email'] ; ?></td>
		</tr>
	<?php 

	}
	}
	?>
	</table>
<?php 
}




}

include "menuinclude.php" ; 
?>


</body>
</html>


