<!DOCTYPE HTML>
<html>
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
 

if($_SESSION['kth_id'])
{
	$ui = $_SESSION['kth_id'] ;
   	$sqlDelete = "DELETE FROM  tll_users WHERE id = '$ui'" ;
	//$delResult = mysql_query($sqlDelete) ;
	$delResult = mysqli_query($con, $sqlDelete) ;
	 
?>
<h1 class="title">Remove profile from Tandem!</h1> 
<br>
<p>You profile has been deleted successfully .
<br><br><p>Any time, you can login with your KTH account and make a new profile.</p>
<br>
<p><a href="login.php?logout=full">Exit from Tandem</a></p>
<br>
 
</p>
<?php 
}

include "menuinclude.php" ; 
?>


</body>
</html>


