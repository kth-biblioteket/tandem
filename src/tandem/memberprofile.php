<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>My Tandem Profile</title>
</head>
<body>

<?php
$page = "members" ;
include "logincheck.php" ;
if(!isset($user)){
	header("location: modifyprofile.php") ;
}

include "alphabet.php" ;
if(isset($_SESSION['kth_id']))
{
	if($_GET['act'] === 'view')
	{
		$uid = $_GET['id'] ;
		$sqlProfile = "SELECT * FROM tll_users WHERE id = '$uid'" ;
    //$resultt = mysql_query($sqlProfile) ;
    $resultt = mysqli_query($con, $sqlProfile) ;
		$rowInfo = mysqli_fetch_assoc($resultt) ;
	 
?>

<h1 class="title"><?php echo $rowInfo['first_name']." ".$rowInfo['last_name']  ; ?> </h1> 
<br>
 <table width="100%" border="0"> 
 
   <tr>
      <td  height="25"><b>Birth Year:</b> <?php  $bd = explode("-", $rowInfo['birth_date']) ; echo $bd[0] ; ?></td>
      <td> </td>
      <td><b>Gender: </b> <?php  
      if($rowInfo['gender'] == 1) {
        echo "Female" ;
      } else 
      if($rowInfo['gender'] == 2) {
        echo "Male" ;
      }
      else  
        {
          echo "Other/don’t want to mention" ;
        }
      ?></td>
    </tr>
    <tr>
      <td height="25"><b>Nationality:</b>  <?php   echo getCountryFullName($rowInfo['nationality']) ; ?></td>
      <td> </td>
      <td><b>E-mail: </b><?php echo $rowInfo['email'] ; ?></td>
    </tr>
    <tr>
      <td height="25"><b>Cellphone:</b> <?php  if($rowInfo['cell_phone'])
				    echo $rowInfo['cell_phone'] ;
				    else
				    echo "&nbsp;<i>no cellphone</i>" ; ?>   </td>
      <td> </td>
      <td><b>Home phone:</b> <?php   if($rowInfo['home_phone'])
				  		  echo $rowInfo['home_phone'] ;
						  else
						  echo "&nbsp;<i>no home phone</i>" ; ?></td>
    </tr>
     <tr>
      <td height="25" colspan="3"> </td>
      
    </tr>
    <tr>
      <td height="25" colspan="3"><b>Languages that I know (and am able to teach others)</b></td>
      
    </tr>
    <tr>
      <td height="25"><b>Native language:</b> <?php   echo getLanguageFullName($rowInfo['lang_have_1']) ; ?></td>
      <td> </td>
      <td></td>
    </tr>
    <tr>
      <td height="25"><b>Second language:</b> <?php   echo getLanguageFullName($rowInfo['lang_have_2']) ; ?></td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td height="25" colspan="3"> </td>
      
    </tr>
        <tr>
      <td height="25" colspan="3"><b>Languages that I want to learn</b></td>
       
    </tr>
        <tr>
      <td height="25"><b>Desired language #1:</b> <?php  echo getLanguageFullName($rowInfo['lang_want_1']) ; ?></td>
      <td> </td>
      <td></td>
    </tr>
            <tr>
      <td height="25"><b>Desired language #2:</b>  <?php  echo getLanguageFullName($rowInfo['lang_want_2']) ; ?></td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td height="25" colspan="3"> </td>
      
    </tr>
        <tr>
      <td height="25" colspan="3"><b>Campus (where I want to meet my tandempartner):</b></td>
      
    </tr>
    <tr>
      <td height="25">  <?php
 					if($rowInfo['campus'])
 					 echo $rowInfo['campus'] ;
 				//	 else
 					// echo "<i>no meeting place </i>" ; ?></td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td height="25" colspan="3"> </td>
      
    </tr>
        <tr>
      <td height="25" colspan="3"><b>Interests:</b></td>
      
    </tr>
    <tr>
      <td height="25" colspan="3"> <?php
 if($rowInfo['interests'])
 	 echo $rowInfo['interests'] ; 
// else
 //	echo "<i>no interst</i>" ;
					 ?></td>
      
    </tr>
    <tr>
      <td height="25" colspan="3"> </td>
      
    </tr>
        <tr>
      <td  height="25" colspan="3"><b>Other comments:</b></td>
      
    </tr>
    <tr>
      <td height="25" colspan="3"> <?php
 					if($rowInfo['comments'])
 					 echo $rowInfo['comments'] ;
 					// else
 					// echo "<i> no comment</i>" ;
					  ?></td>
       
    </tr>
    <tr>
      <td height="20" colspan="3"> </td>
      
    </tr>
        <tr>
      <td colspan="3" height="20"><?php
  //      if($rowInfo['busy']== "t")
//  echo "I currently have a language partner, and would like to be tagged as busy in the this system." ;	  
 	//  else
 // echo "I currently don't have a language partner." ;	  
	   ?> </td>
      
    </tr>
        
</table>
<?php 
	 

}

  

}

include "menuinclude.php" ; 
?>


</body>
</html>


