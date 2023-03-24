<!DOCTYPE HTML>
<html>
<head>
<!--  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">   -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

//$capitalLetter 	= $_GET['capitalLetter'] ;
//$smallLetter 	= $_GET['smallLetter'] ;



$letter = $_GET['letter'] ;
 
Switch ($letter)
{
	case 'a':
		$smallLetter = $letter ;
		$capitalLetter = 'A' ;
		break ;
	
		case 'b':
		$smallLetter = $letter ;
		$capitalLetter = 'B' ;
		break ;
	
	case 'c':
		$smallLetter = $letter ;
		$capitalLetter = 'C' ;
		break ;
	
	case 'd':
		$smallLetter = $letter ;
		$capitalLetter = 'D' ;
		break ;
	
	case 'e':
		$smallLetter = $letter ;
		$capitalLetter = 'E' ;
		break ;
	
	case 'f':
		$smallLetter = $letter ;
		$capitalLetter = 'F' ;
		break ;
	
	case 'g':
		$smallLetter = $letter ;
		$capitalLetter = 'G' ;
		break ;
	
	case 'h':
		$smallLetter = $letter ;
		$capitalLetter = 'H' ;
		break ;
	
	case 'i':
		$smallLetter = $letter ;
		$capitalLetter = 'I' ;
		break ;

	case 'j':
		$smallLetter = $letter ;
		$capitalLetter = 'J' ;
		break ;
	
	case 'k':
		$smallLetter = $letter ;
		$capitalLetter = 'K' ;
		break ;
	
	case 'l':
		$smallLetter = $letter ;
		$capitalLetter = 'L' ;
		break ;

	case 'm':
		$smallLetter = $letter ;
		$capitalLetter = 'M' ;
		break ;
	
	case 'n':
		$smallLetter = $letter ;
		$capitalLetter = 'N' ;
		break ;

	case 'o':
		$smallLetter = $letter ;
		$capitalLetter = 'O' ;
		break ;

	case 'p':
		$smallLetter = $letter ;
		$capitalLetter = 'P' ;
		break ;

	case 'q':
		$smallLetter = $letter ;
		$capitalLetter = 'Q' ;
		break ;

	case 'r':
		$smallLetter = $letter ;
		$capitalLetter = 'R' ;
		break ;						

	case 's':
		$smallLetter = $letter ;
		$capitalLetter = 'S' ;
		break ;

	case 't':
		$smallLetter = $letter ;
		$capitalLetter = 'T' ;
		break ;

	case 'u':
		$smallLetter = $letter ;
		$capitalLetter = 'U' ;
		break ;

	case 'v':
		$smallLetter = $letter ;
		$capitalLetter = 'V' ;
		break ;

	case 'w':
		$smallLetter = $letter ;
		$capitalLetter = 'W' ;
		break ;
		
	case 'x':
		$smallLetter = $letter ;
		$capitalLetter = 'X' ;
		break ;

	case 'y':
		$smallLetter = $letter ;
		$capitalLetter = 'Y' ;
		break ;

	case 'z':
		$smallLetter = $letter ;
		$capitalLetter = 'Z' ;
		break ;

	case 'A2':
		$smallLetter = '&auml;' ;
		$capitalLetter = '&Auml;' ;
		break ;
		
	case 'A1':
		$smallLetter = '&aring;' ;
		$capitalLetter = '&Aring;' ;
		break ;

	case 'O2':
		$smallLetter = '&ouml;' ;
		$capitalLetter = '&Ouml;' ;
		break ;
}

$sql = "SELECT * FROM tll_users WHERE first_name like '$smallLetter%'  OR   first_name like '$capitalLetter%' ORDER BY first_name " ;
$res  	= mysqli_query($con, $sql) ;



$sql = "SELECT * FROM tll_users WHERE first_name like '$smallLetter%'  OR   first_name like '$capitalLetter%' ORDER BY first_name " ;
$res  	= mysqli_query($con, $sql) ;
if($_SESSION['kth_id'])
{
	//echo date("Y") ;	 
?>

<h1 class="title">Administration: Members (<?php echo $capitalLetter ; ?>)</h1> 
<p>Member list are sorted alphabetically. </p>
 <table width="100%" border="1"> 
 <tr bgcolor="#DCE6EF">
      <td> Name </td>
      <td class="fontstyles"> Age </td>
      <td class="fontstyles"> Gender </td>
      <td class="fontstyles"> Nationality </td>
      <td style="font-size:9px;"> Email Address</td>
    </tr>
<?php 
while($users = mysqli_fetch_assoc($res))
{
	 $onlyYear = explode("-", $users['birth_date']) ;
 	 $onlyYear = $onlyYear[0] ;
	 $age = date("Y") - intval($onlyYear)  ;
?>
     <tr>
      <td><a href="memberprofile.php?act=view&id=<?php echo $users['id']; ?>"><?php echo $users['first_name']." ".$users['last_name'] ; ?></a></td>
      <td class="fontstyles"><?php echo $age ; ?></td>
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
      <td class="fontstyles"><?php echo getCountryFullName($users['nationality']) ; ?></td>
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


