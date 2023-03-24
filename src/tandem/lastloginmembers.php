<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	$month = $_GET['month'] ;
	$year  = $_GET['year'] ;
	
 	$sqlLastlogin = "SELECT * FROM tll_users
					WHERE lastloginyear = '$year'  AND lastloginmonth = '$month' ORDER BY last_login" ;
 	//GROUP BY  tll_users.id
 	$result = mysqli_query($con, $sqlLastlogin) ;
?>

<h1 class="title">Administration: Member list - in Last Login order</h1> 
<p>Member list are sorted by last login date. </p>
<?php 
$result2 = mysqli_query($con, $sqlLastlogin) ;
$userNumber = mysqli_fetch_assoc($result2) ;
if(!$userNumber)
{
	
	echo "<br><br> No one logged in!" ;
}
?>


 <table width="100%" border="1"> 
  <tr bgcolor="#DCE6EF">
      <td> Name </td>
      <td class="fontstyles"> Age </td>
      <td class="fontstyles"> Gender </td>
      <td class="fontstyles"> Nationality </td>
       <td class="fontstyles"> Last Login </td>
      <td style="font-size:9px;"> Email Address</td>
    </tr>
<?php 
while($users = mysqli_fetch_assoc($result))
{
	
	 $onlyYear = explode("-", $users['birth_date']) ;
 	 $onlyYear = $onlyYear[0] ;
	 $age = date("Y") - intval($onlyYear)  ;

?>
     <tr>
      <td><a href="memberprofile.php?act=view&id=<?php echo $users['id']; ?>"><?php echo $users['first_name']." ".$users['last_name'] ; ?></a></td>
      <td class="fontstyles" width="25" align="center"><?php echo $age ; ?></td>
      <td class="fontstyles"><?php  if($users['gender'] == 1) {
                        echo "Female" ;
                      } else
                      if($users['gender'] == 2) {
                        echo "Male" ;
                      }
                      else  
                        {
                          echo "Other/don’t want to mention" ;
                        } ?></td>
      <td class="fontstyles"><?php echo getCountryFullName($users['nationality']) ; ?></td>
      <td  ><?php echo $users['last_login'] ; ?></td>
      <td style="font-size:9px;"><?php echo $users['email'] ; ?></td>
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


