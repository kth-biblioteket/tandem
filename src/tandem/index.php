<!DOCTYPE HTML>
<html>
<head>
<title>My Tandem Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
	.menu1 {
		display:none; 
	}
</style>
</head>
<body>

<?php
 
//echo $_POST['first_name'] ;
$page = "home" ;
$x = 0;

//include "modify.php" ;

include "logincheck.php" ;

if($x == 0){
  	header("location: modifyprofile.php") ;
}

if(isset($_SESSION['kth_id']))
{
?>
 
<h1 class="title">My Tandem Profile</h1> 
<p>You may modify your profile by <a href="modifyprofile.php">clicking here</a>.</p>
<div><h4><?php if(isset($user)) {echo $user['first_name']." ".$user['last_name'] ;} ?></h4></div>  
<table>
  
  <tr>
    <td> 
      <table width="100%" border="0">
        <tr>
          <td>
                  <table>
                  <tr>
                  <td nowrap height="20"> <b>Birth Year:</b> </td>
                  <td> 
                  <?php 
            $onlyYear = explode("-", $user['birth_date']) ;
            echo $onlyYear = $onlyYear[0] ;
            
             ?>&nbsp;</td>
                  </tr>
                  </table>
                  
          </td>
          <td width="100">&nbsp;</td>
          <td>
          		<table>
                  <tr>
                  <td nowrap> <b>Gender:</b> </td>
                  <td>  <?php  
                      if($user['gender'] == 1) {
                        echo "Female" ;
                      } else
                      if($user['gender'] == 2) {
                        echo "Male" ;
                      }
                      else  
                        {
                          echo "Other/don’t want to mention" ;
                        }
                    ?>&nbsp;</td>
                  </tr>
                  </table>
          
          
                     </td>
        </tr>
        <tr>
          <td>
         		 <table>
                  <tr>
                  <td nowrap height="20"><b>Nationality:</b></td>
                  <td>  <?php   echo getCountryFullName($user['nationality']) ; ?>&nbsp;</td>
                  </tr>
                  </table>
          
                      </td>
          <td>&nbsp;</td>
          <td>
          	 <table>
                  <tr>
                  <td nowrap><b>E-mail:</b></td>
                  <td>  <?php echo $user['email'] ; ?>&nbsp;</td>
                  </tr>
                  </table>
           </td>
        </tr>
        <tr>
          <td>
          		<table>
                  <tr>
                  <td nowrap height="20"> <b>Cellphone:</b></td>
                  <td nowrap> <?php  if($user['cell_phone'])
				    echo $user['cell_phone'] ;
				    else
				    echo "&nbsp;<i>no cellphone</i>" ; ?>&nbsp;</td>
                  </tr>
                  </table>
          
                     </td>
          <td>&nbsp;</td>
          <td>
          		<table>
                  <tr>
                  <td nowrap><b>Home phone:</b></td>
                  <td nowrap> <?php   if($user['home_phone'])
				  		  echo $user['home_phone'] ;
						  else
						  echo "&nbsp;<i>no home phone</i>" ; ?>&nbsp;</td>
                  </tr>
                  </table>
                     </td>
        </tr>
        
    </table></td>
    
  </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  <tr>
    <td>
    	 <table>
                  <tr>
                  <td colspan="2" nowrap><b>Languages that I know (and am able to teach others):</b>   </td>
                  </tr>
                  <tr>
                    <td nowrap height="25">Native language: <?php   echo getLanguageFullName($user['lang_have_1']) ; ?></td>
                     <td nowrap> </td>
                  </tr>
                  <tr>
                    <td nowrap height="25">Second language:  <?php   echo getLanguageFullName($user['lang_have_2']) ; ?></td>
                    <td nowrap>&nbsp;</td>
                  </tr>
                  </table>
    </td>
     
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    	 <table>
                  <tr>
                  <td colspan="2" nowrap><b>Languages that I want to learn:</b>   </td>
                  </tr>
                  <tr>
                    <td nowrap height="25">Desired language #1:  <?php  echo getLanguageFullName($user['lang_want_1']) ; ?></td>
                     <td nowrap> </td>
                  </tr>
                  <tr>
                    <td nowrap height="25">Desired language #2:  <?php  echo getLanguageFullName($user['lang_want_2']) ; ?></td>
                    <td nowrap>&nbsp;</td>
                  </tr>
                  </table>
    </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td> <table>
                  <tr>
                  <td colspan="2" nowrap><b>Campus (where I want to meet my tandempartner):</b></td>
                  </tr>
                  <tr>
                    <td nowrap height="25">  <?php
 					if($user['campus'])
 					 echo $user['campus'] ;
 					 else
 					 echo "<i>no meeting place </i>" ; ?></td>
                     <td nowrap> </td>
                  </tr>
                   
                  </table>
    </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>		<table>
                  <tr>
                  <td colspan="2" nowrap><b>Interests:</b></td>
                  </tr>
                  <tr>
                    <td height="25">  <?php
 if($user['interests'])
 	 echo $user['interests'] ; 
 else
 	echo "<i>no interst</i>" ;
					 ?></td>
                     <td nowrap> </td>
                  </tr>
                  </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table>
                  <tr>
                  <td colspan="2" nowrap><b>Other comments:</b></td>
                  </tr>
                  <tr>
                    <td height="25">  <?php
 					if($user['comments'])
 					 echo $user['comments'] ;
 					 else
 					 echo "<i> no comment</i>" ;
					  ?></td>
                     <td nowrap> </td>
                  </tr>
                  </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td> <?php
        if($user['busy']== "t")
  echo "I currently have a language partner, and would like to be tagged as busy in the this system." ;	  
 	  else
  echo "I currently don't have a language partner." ;	  
	   ?></td>
    </tr>
</table>
         
 <br /><br />    

<?php 
}

include "menuinclude.php" ; 
?>

</body>
</html>