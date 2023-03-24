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
if(@$user['manager'] != "t" && @$user['admin'] != "t" )
{
	header("location: index.php") ;	
}

include "alphabet.php" ;
if($_SESSION['kth_id'])
{
	$cYear = date("Y") ;
	$cMonth  = date("m") ;
	
 	$sqlLastlogin = "SELECT * FROM tll_users
					WHERE lastloginyear = '$cYear'  AND lastloginmonth = '$cMonth' ORDER BY last_login" ;
  	$result = mysqli_query($con, $sqlLastlogin) ;
?>

<h1 class="title">Administration: Stats</h1> 
<br>
  <table width="100%" border="1"> 
  <tr  bgcolor="#DCE6EF">
            <td>yyyy / mm</td>
            <td align="center">No. of logins</td>
            <td align="center">No. of logins of  active accounts</td>
            <td align="center">No. of new registration</td>
            <td align="center">No. of total registered users</td>
	</tr>
<?php 
for($i = $cYear ; $i >= 2005 ; $i -- )
{ 
	if($i ==$cYear )
	{
		for($j = $cMonth ; $j >= 1 ; $j--)
		{
			?>
			<tr>
                <td ><?php echo $i."/".$j ; ?> </td>
                <td align="center"><?php echo getLoginNumbers($i, $j) ; ?></td>
                <td align="center"><?php echo activeUserLogins($i, $j) ; ?></td>
                <td align="center"><?php echo $reg = registrationNumber($i, $j, "date") ;  ?></td>
                <td align="center"><?php echo $total = registrationNumber($i, $j, "total") ; ?></td>
			</tr>
			<?php
		}
	}
	else
	{
		for($j = 12 ; $j >= 1 ; $j--)
		{
		?>
        <tr>
                <td ><?php echo $i."/".$j ; ?> 	</td>
                <td align="center"><?php echo getLoginNumbers($i, $j) ; ?></td>
                <td align="center"><?php echo activeUserLogins($i, $j) ; ?></td>
                <td align="center"><?php echo $reg =  registrationNumber($i, $j, "date") ; ?></td>
                <td align="center"><?php  echo $total = $total - $reg ; ?></td>
		</tr>
        <?php
		}
	}
}	
 
 ?>
</table>
<?php 

}

include "menuinclude.php" ; 


function getLoginNumbers($year, $month)
{
	global $con;
	$k = 0 ;
	$sql = "SELECT count(id) as nroflogins FROM  tll_logincounts WHERE loginyear = '$year' AND loginmonth = '$month'" ;
	$result = mysqli_query($con, $sql) ;
	while($users = mysqli_fetch_assoc($result))
	{	
		return $users['nroflogins'];
	}
}

function activeUserLogins($year, $month)
{
	global $con;
	$k = 0 ;
	$sql = "SELECT userid FROM  `tll_logincounts` WHERE loginyear = '$year' AND loginmonth = '$month'" ;
	$result = mysqli_query($con, $sql) ;
	while($users = mysqli_fetch_assoc($result))
	{	
		$uid 		= $users['userid'] ;
		$sqlUser 	= "SELECT id FROM `tll_users`  WHERE id = '$uid'" ;
		$resultUser = mysqli_query($con, $sqlUser) ;
		$OneUser 	= mysqli_fetch_assoc($resultUser) ;
		if($OneUser) $k ++ ;
	}
	return $k ;
}

function registrationNumber($year, $month , $type)
{
	global $con;
	$k = 0 ;
	$g = 0 ;
	$currentYear  = date("Y") ;
	$currentMonth = date("m") ;
//echo 	$c = date("Y-m-d H:i:s") ;
 	$sql = "SELECT reg_date FROM `tll_users` where reg_date is not null" ;
	$result = mysqli_query($con, $sql) ;
 	while($Userlist = mysqli_fetch_assoc($result))
	{	
		$regDate  = explode("-" , $Userlist['reg_date'] ) ;
	 	$regYear  = $regDate[0] ;
		$regMonth = $regDate[1] ;
		if($regYear == $year && $regMonth == $month )$k++ ;
		
		if($regYear < $year) $g++ ;
		else if( $regYear == $year && $regMonth <= $month )$g++ ;
	}  
	if($type == "date") return $k ;
	else if($type == "total") return $g ;
}

  
?>


</body>
</html>