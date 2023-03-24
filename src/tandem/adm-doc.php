<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-4">
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
	 
?>

<h1 class="title">ADM-Documentation</h1> 
<br>
 <br>
 
We are updating the information. This page is comming soon.
 <br>
  <br>
<?php 

}

include "menuinclude.php" ; 
?>


</body>
</html>


