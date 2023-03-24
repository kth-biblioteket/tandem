<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Modify Profile</title>
<script>
 
function getCapmus(id)
{
	var inputval ;
	// alert(id) ;
	if(id === 'campus')
	{
		inputval =  'Campus Valhallavägen'  ;	 
		
	}
	if(id === 'kista')
	{
		inputval = 'KTH Kista' ;
		 
	}
	if(id === 'fleming'){
		 inputval = 'KTH Flemingsberg' ;
		 
	}
	if(id === 'haninge'){
		inputval = 'KTH Haninge' ;
		 
	}
	if(id === 'soder'){
		inputval = 'KTH Södertälje ' ;
		 
	}
	//alert(inputval) ;
	$("#campus").val(inputval) ; 
}
</script>
</head>
<body>
<?php 
$page = "profile" ;
include "logincheck.php" ;

if(isset($_SESSION['kth_id']))
{  
	?>

	<h1 class="title">Modify profile</h1> 
	   <p>You may modify your profile below.</p>
<form action="https://apps-ref.lib.kth.se/tandem/modify.php" method="POST" id="fm1" class="large fm-v clearfix" enctype="multipart/form-data">    
<input type="hidden" name="kth_i_d" value="<?php echo $_SESSION['kth_id'] ; ?>">
	<label class="fl-label">First Name:</label>
	<input    name="first_name" type="text" value="<?php echo $user['first_name'] ; ?>"   required   >
	<label   class="fl-label">Last Name:</label>
	<input   required="required"  name="last_name" class="required"  type="text" value="<?php echo $user['last_name'] ; ?>" size="50" >
	<label  class="fl-label">Birth Year:</label>
	<?php 
	$onlyYear = explode("-", $user['birth_date']) ;
	$onlyYear = $onlyYear[0] ;
	$k = intval($onlyYear) ;

	?>
	<select name="birth_date">
	<option value=""> -- Select your birth year --</option>
	<?php 
	
	
	for($i=2010 ; $i>1900 ; $i-- )
	{
		$j = $i ;
		?>
		<option value="<?php echo $j ; ?>" <?php   if($j == $k) echo ' selected ' ; ?> ><?php echo $j ; ?></option> 
		<?php 
	}
	
	?>
	   </select>  
	        
	   <label  class="fl-label">Gender:</label>

	    <select name="gender" >
	   		 <option value=""> -- Select your gender --</option>
	    	<option <?php if($user['gender'] == 2) echo "selected" ; ?> >Male</option>
	        <option <?php if($user['gender'] == 1) echo "selected" ; ?> >Female</option>       
			<option <?php if($user['gender'] == 3) echo "selected" ; ?> >Other/don’t want to mention</option>
	    </select>    
	        
	<label class="fl-label">Nationality:</label>
	 <?php 
	 $usercountry =  getCountryFullName($user['nationality']) ;
	 ?>      
	<select name="nationality">
	<?php 
	$coutrySql = "SELECT * FROM countries ORDER BY name_en" ;
	$result = mysqli_query($con, $coutrySql) ;
	while($conrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $conrow['id'] ; ?>"  <?php if( $usercountry == $conrow['name_en'] ) echo " selected "; ?>><?php echo $conrow['name_en'] ; ?></option>
	<?php	
	}
	?>
	     </select>

	 <label class="fl-label">E-mail:</label>
	       
	 <input  name="email" class="required"   accesskey="a" type="text" value="<?php echo $user['email'] ; ?>" size="50" >        
	        
	        
	 <label  class="fl-label">Cellphone:</label>
	       
	 <input  name="cell_phone" class="required"  accesskey="a" type="text" value="<?php echo $user['cell_phone'] ; ?>" size="50" >
	        
	 <label class="fl-label">Home phone:</label>
	       
	 <input name="home_phone" class="required"   accesskey="a" type="text" value="<?php echo $user['home_phone'] ; ?>" size="50"  >
	        
	 <label   class="fl-label">Languages that I know (and am able to teach others):</label>
	 <label   class="fl-label">Native language:</label>

	<?php 
	 $usernational =  getLanguageFullName($user['lang_have_1']) ;
	 ?>      
	<select name="lang_have_1">
	<option value=""> -- Select your language -- </option>
	<?php 
	$langSql = "SELECT * FROM tll_languages  ORDER BY name_en" ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>"  <?php if( $usernational == $langrow['name_en'] ) echo " selected "; ?>><?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
	</select>

	 <label class="fl-label">Second language:</label>
	<?php 
	 $usernational =  getLanguageFullName($user['lang_have_2']) ;
	 ?>      
	<select name="lang_have_2">
	<option value=""> -- Select your language -- </option>
	<?php 
	$langSql = "SELECT * FROM tll_languages  WHERE tll = 1  ORDER BY name_en" ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>"  <?php if( $usernational == $langrow['name_en'] ) echo " selected "; ?>><?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
	     </select> 

	<br /><br />  <label  class="fl-label">Languages that I want to learn:</label>
	<label class="fl-label">Desired language #1:</label>
	<?php 
	 $usernational =  getLanguageFullName($user['lang_want_1']) ;
	 ?>      
	<select name="lang_want_1">
	<option value=""> -- Select your language -- </option>
	<?php 
	$langSql = "SELECT * FROM tll_languages WHERE tll = 1  ORDER BY name_en" ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>"  <?php if( $usernational == $langrow['name_en'] ) echo " selected "; ?>><?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
	</select> 

	 <label class="fl-label">Desired language #2:</label>
	       
	<?php 
	 $usernational =  getLanguageFullName($user['lang_want_2']) ;
	 ?>      
	<select name="lang_want_2">
	<option value=""> -- Select your language -- </option>
	<?php 
	$langSql = "SELECT * FROM tll_languages  WHERE tll = 1 " ;
	$result = mysqli_query($con, $langSql) ;
	while($langrow = mysqli_fetch_assoc($result))
	{
	?>
		<option value="<?php echo $langrow['id'] ; ?>"  <?php if( $usernational == $langrow['name_en'] ) echo " selected "; ?>> <?php echo $langrow['name_en'] ; ?></option>
	<?php	
	}
	?>
	</select>

	<br /><br />        
	          <label class="fl-label" >Campus (where I want to meet my tandempartner):</label>
	       
	        <input  name="campus" id="campus" class="required" type="text" value="<?php echo $user['campus'] ; ?>" size="50"  > 
	        <br />- for example:<br />
	        <span id="campus" onclick="getCapmus('campus') ;"><u>Campus Valhallav&auml;gen</u></span> |
	        <span id="kista" onclick="getCapmus('kista') ;"><u>KTH Kista</u></span> |
	        <span id="fleming" onclick="getCapmus('fleming') ;"><u>KTH Flemingsberg</u></span> |
	        <span id="haninge" onclick="getCapmus('haninge') ;"><u>KTH Haninge</u></span> |
	        <span id="soder" onclick="getCapmus('soder') ;"><u>KTH S&ouml;dert&auml;lje</u></span>
	        
	<br /><br />          
	
	<label class="fl-label">Interests:</label>
	  <textarea name="interests" ><?php echo $user['interests'];  ?></textarea>    
	        
	        
	 <label  class="fl-label">Other comments:</label>
		<textarea  name="comments" ><?php echo $user['comments'];  ?></textarea>    
		
		
	    <input type="checkbox"  value="busy" name="busy" <?php if($user['busy'] === "t") echo " checked " ; ?> />  I currently have a language partner, and would like to be tagged as busy in the this system.

	       <div class="buttons">
	       	  <div class="dataManipulation">
	          	<input name="saveprofile" value="Save Changes"   type="submit">
	          </div>
	       </div>
	    </form>
	<?php
}
  include "menuinclude.php" ;  

?>

</body>
</html>