<?php
if (!isset($_SESSION)) {
	session_start();
}

// Timezone
date_default_timezone_set("Europe/Stockholm");

include "dbconnect.php" ;

if(!isset($_SESSION['kth_id']))
{
	echo "<br/><br/><br/><br/>You can login with your KTH ID, then you will be able to see your profile in Tandem. <br/>If you are already logged in the KTH,
			So just <a href='login.php'>click here</a>, Otherwise please login.<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>
				<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>" ;
			//header("location: login.php");

} else {

	$sqUser = "SELECT * FROM tll_users WHERE id = '".$_SESSION['kth_id']."'" ;
	   
    //$resultUser = mysql_query($sqUser);
	//$x 	= mysql_num_rows($resultUser);
	$resultUser = mysqli_query($con, $sqUser);
   	$x 	= mysqli_num_rows($resultUser);
	if($x != 0 || $x != "" )
	{
		 //$user = mysql_fetch_assoc($resultUser);
		 $user = mysqli_fetch_assoc($resultUser);
	}
}
