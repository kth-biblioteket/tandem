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

if(isset($_GET['act'])) {
	if($_GET['act'] === "change")
	{
		$langid = $_GET['id'] ;
		$sqlchange 	= "SELECT * FROM tll_languages WHERE id = '$langid' " ;
		//$result  	= mysql_query($sqlchange) ;
		$result  	= mysqli_query($con, $sqlchange) ;
		$LANG 		= mysqli_fetch_assoc($result) ;
		
		if($LANG['tll'] == 0 )
		{
			$sqlchange = "UPDATE tll_languages SET tll = 1 WHERE id = '$langid' " ;
		}
		else
		{
			$sqlchange = "UPDATE tll_languages SET tll = 0  WHERE id = '$langid'" ;
		}
		//mysql_query($sqlchange) ;
		mysqli_query($con, $sqlchange) ;
	}
}


if($_SESSION['kth_id'])
{
	 
?>
<h1 class="title">Administration: Languages</h1> 
<br>
<table width="80%" border="1" >   
 <tr>
    <td nowrap="nowrap">Id</td>
    <td>Language</td>
    <td>Status</td>
    <td>Change</td>
    
  </tr>
 <?php 
$sqlLang = "SELECT * FROM tll_languages ORDER BY name_en" ; 
//$res  	= mysql_query($sqlLang) ;
$res  	= mysqli_query($con, $sqlLang) ;
while($row = mysqli_fetch_assoc($res))
{
 ?> 
  <tr>
    <td nowrap="nowrap"><?php echo $row['id'] ; ?></td>
    <td><?php echo $row['name_en'] ; ?></td>
    <td><?php 
    		if($row['tll'] == 0 )
			{ 
				echo "--" ; 
			}
			else
			{
				echo "Active" ;
			}
			?></td>
    <td><a href="languages.php?act=change&id=<?php echo $row['id'] ; ?>">switch</a></td>
    
  </tr> 
 <?php 
 
} 
 ?> 
</table>
<?php 
}

include "menuinclude.php" ; 
?>


</body>
</html>