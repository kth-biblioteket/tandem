<ul class="menu2"  id="menu2" style="1display:none">
<?php
if( isset($_SESSION['kth_id'])) {

?>
    <li  <?php if($page === "profile") echo "class='selected'" ; else  echo "class='leaf'" ; ?>  >
        <a class="menuItem"   href="index.php" title="My Profile">My Profile </a>
        <!--  myprofile  echo "<a href=\"myprofile.php\">My Profile</a> | "; -->
    </li>
    <li  <?php if($page === "profile") echo "class='selected'" ; else  echo "class='leaf'" ; ?>  >
        <a class="menuItem"   href="modifyprofile.php" title="Modify My Profile">Modify My Profile </a>
        <!--  myprofile  echo "<a href=\"myprofile.php\">My Profile</a> | "; -->
    </li>
    <li class="leaf">
        <a class="menuItem"   href="search.php">Search</a>
    </li>
   
   
    <li class="leaf">
        <a class="menuItem"   href="offerequest.php">Offer and Request</a>
    </li>
  
    <li class="leaf">
        <a class="menuItem"   href="removeprofile.php" title="My Profile">Remove Profile From Tandem</a>
    </li>
    
    <li class="leaf">
        <a class="menuItem"   href="logout.php">Log out from KTH-login</a>
        <!-- echo "User: ".@$_SESSION['user'] -->
    </li>
<?php	
}
else
{
?>
<li class="leaf"><a  class="menuItem"   href="login.php">Login/Register</a></li>
<?php 
}
if(@$user['manager'] === "t" && @$user['admin'] === "t" ) {
?>
<li class="leaf">
        <a class="menuItem"   href="members.php">Members</a>
    </li>
    <li class="leaf">
        <a class="menuItem"   href="lastlogins.php">Last Logins</a>
    </li>
    
    <li class="leaf">
        <a class="menuItem"   href="stats.php">Stats</a>
    </li>
    <li class="leaf">
        <a class="menuItem"   href="languages.php">Languages</a>
    </li>
    <li class="leaf">
        <a class="menuItem"   href="offerequest.php">Offer and Request</a>
    </li>
     
    <li class="leaf">
        <a class="menuItem"   href="adm-doc.php" title="My Profile">ADM-Documentation </a>
    </li>
<?php	

} 
 ?>

<li class="leaf">
   	 	<a class="menuItem"  href="<?php echo $app_url?>" title="My Profile">Tandem Language Learning</a>
</li>
    
</ul>