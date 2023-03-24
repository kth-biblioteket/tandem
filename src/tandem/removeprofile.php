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
	 
?>
<h1 class="title">Remove profile from Tandem!</h1> 
<br>
<p>Your profile in Tandem is a different and seprate profile from your KTH account. 
It means if you remove your profile from Tandem, Your KTH account and your KTH profile won't be deleted.
This profile is used only to find your language learning partner.
<br><br>Any time you can login with your KTH account and make a new profile.
<br><br>
<a href="deleteprofile.php" onclick="return confirm('Are you sure that you want to remove your profile from Tandem?');">Remove my profile in Tandem Learning.</a>
</p>
<?php 
}

include "menuinclude.php" ; 
?>


</body>
</html>


