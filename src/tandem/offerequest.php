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
	/*
	$month = $_GET['month'] ;
	$year  = $_GET['year'] ;
	
 	$sqlLastlogin = "SELECT * FROM tll_users
					WHERE lastloginyear = '$year'  AND lastloginmonth = '$month' ORDER BY last_login" ;
 	//GROUP BY  tll_users.id
	 $result = mysql_query($sqlLastlogin) ;
	 */
?>

<h1 class="title">Administration: Speaks/Wants</h1> 
 
<br>
  <table width="100%" border="1"> 
  <tr>
            <td> Language </td>
            <td align="center"> Speaks </td>
            <td align="center"> Wants </td>
            
 </tr>

 <?php 
$langSql = "SELECT * FROM tll_languages  WHERE tll = 1  ORDER BY name_en" ;
$result = mysqli_query($con, $langSql) ;
while($langs = mysqli_fetch_assoc($result))
{
?>
<tr <?php if(howManyWant($langs['id']) > howManySpeak($langs['id'])) echo " style='background-color:#DCE6EF'" ; ?> >
            <td><?php echo $langs['name_en'] ; ?></td>
            <td align="center"><?php echo howManySpeak($langs['id']) ;?></td>
            <td align="center"><?php echo howManyWant($langs['id']) ;?></td>
 </tr>	
<?php	 
}

?>
</table>
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




?>


</body>
</html>


