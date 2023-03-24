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
if(@$user['manager'] != "t" && @$user['admin'] != "t" )
{
	header("location: index.php") ;	
}

include "alphabet.php" ;
if($_SESSION['kth_id'])
{
	//echo date("Y") ;	 
?>

<h1 class="title">Administration: Member list - in Last Login order  </h1> 
<br>
   
<?php 
$startyear 		= 2005 ;
$currentyear 	= date("Y") ;
$currentmonth 	= date("m") ;


for($i=$currentyear ; $i >= $startyear ; $i--)
{
	
?>
     <p><a href="lastlogins2013.html" title="2013"><?php echo $i ; ?></a>                                       
<table width="500" border="1">
   <tr>
    <td><?php if($i == $currentyear){ if($currentmonth >= 1){ ?><a href="lastloginmembers.php?month=1&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>January">January</a><?php } else { echo "January" ; }}
    		  else{ ?><a href="lastloginmembers.php?month=1&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>January">January</a><?php }?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 2){ ?><a href="lastloginmembers.php?month=2&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>February">February</a><?php } else { echo "February" ; }}
    			else {?><a href="lastloginmembers.php?month=2&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>February">February</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 3){ ?><a href="lastloginmembers.php?month=3&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>March">March</a><?php } else { echo "March" ; }}
    			else {?><a href="lastloginmembers.php?month=3&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>March">March</a><?php } ?></td>
  </tr>
  <tr>
    <td><?php if($i == $currentyear){ if($currentmonth >= 4){ ?><a href="lastloginmembers.php?month=4&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>April">April</a><?php } else { echo "April" ; }}
    			else {?><a href="lastloginmembers.php?month=4&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>April">April</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 5){ ?><a href="lastloginmembers.php?month=5&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>May">May</a><?php } else { echo "May" ; }}
    			else {?><a href="lastloginmembers.php?month=5&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>May">May</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 6){ ?><a href="lastloginmembers.php?month=6&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>June">June</a><?php } else { echo "June" ; }}
    			else {?><a href="lastloginmembers.php?month=6&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>June">June</a><?php } ?></td>
  </tr>
  <tr>
    <td><?php if($i == $currentyear){ if($currentmonth >= 7){ ?><a href="lastloginmembers.php?month=7&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>July">July</a><?php } else { echo "July" ; }}
    			else {?><a href="lastloginmembers.php?month=7&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>July">July</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 8){ ?><a href="lastloginmembers.php?month=8&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>May">August</a><?php } else { echo "August" ; }}
    			else {?><a href="lastloginmembers.php?month=8&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>May">August</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 9){ ?><a href="lastloginmembers.php?month=9&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>September">September</a><?php } else { echo "September" ; }}
    			else {?><a href="lastloginmembers.php?month=9&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>September">September</a><?php } ?></td>
   
  </tr>
  <tr>
    <td><?php if($i == $currentyear){ if($currentmonth >= 10){ ?><a href="lastloginmembers.php?month=10&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>October">October</a><?php } else { echo "October" ; }}
    			else {?><a href="lastloginmembers.php?month=10&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>October">October</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 11){ ?><a href="lastloginmembers.php?month=11&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>November">November</a><?php } else { echo "November" ; }}
    			else {?><a href="lastloginmembers.php?month=11&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>November">November</a><?php } ?></td>
    <td><?php if($i == $currentyear){ if($currentmonth >= 12){ ?><a href="lastloginmembers.php?month=12&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>December">December</a><?php } else { echo "December" ; }}
    			else {?><a href="lastloginmembers.php?month=12&year=<?php echo $i ; ?>" title="<?php echo $i ; ?>>December">December</a><?php } ?></td> 
   
    
  </tr>
</table>
</p>
<br>
<?php 

}

 
}

include "menuinclude.php" ; 
?>


</body>
</html>


