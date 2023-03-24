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

if($_SESSION['kth_id'])
{
	 
?>
<h1 class="title">Administration: Members</h1> 
<p>Member list are sorted alphabetically. To view the member list, click on the strated charachter.</p>
 
 
<table width="80%" border="0">
  <tr>
    <td align="center" height="30" width="33%"><a href="membersdet.php?letter=a" title="A">A</a></td>
    <td align="center"  width="33%"><a href="membersdet.php?letter=b" title="B">B</a></td>
    <td align="center"  width="33%"><a href="membersdet.php?letter=c" title="C">C</a></td>
  </tr>
  <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=d" title="D">D</a></td>
    <td align="center" ><a href="membersdet.php?letter=e" title="E">E</a></td>
    <td align="center" ><a href="membersdet.php?letter=f" title="F">F</a></td>
  </tr>
  <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=g" title="G">G</a></td>
    <td align="center" ><a href="membersdet.php?letter=h" title="H">H</a></td>
    <td align="center" ><a href="membersdet.php?letter=i" title="I">I</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=j" title="J">J</a></td>
    <td align="center" ><a href="membersdet.php?letter=k" title="K">K</a></td>
    <td align="center" ><a href="membersdet.php?letter=l" title="L">L</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=m" title="M">M</a></td>
    <td align="center" ><a href="membersdet.php?letter=n" title="N">N</a></td>
    <td align="center" ><a href="membersdet.php?letter=o" title="O">O</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=p" title="P">P</a></td>
    <td align="center" ><a href="membersdet.php?letter=q" title="Q">Q</a></td>
    <td align="center" ><a href="membersdet.php?letter=r" title="R">R</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=s" title="S">S</a></td>
    <td align="center" ><a href="membersdet.php?letter=t" title="T">T</a></td>
    <td align="center" ><a href="membersdet.php?letter=u" title="U">U</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=v" title="V">V</a></td>
    <td align="center" ><a href="membersdet.php?letter=w" title="W">W</a></td>
    <td align="center" ><a href="membersdet.php?letter=x" title="X">X</a></td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=y" title="Y">Y</a></td>
    <td align="center" ><a href="membersdet.php?letter=z" title="Z">Z</a></td>
    <td align="center" > </td>
  </tr>
   <tr>
    <td align="center"  height="30"><a href="membersdet.php?letter=A2" title="&Auml;">&Auml;</a></td>
    <td align="center" ><a href="membersdet.php?letter=A1" title="&Aring;">&Aring;</a></td>
    <td align="center" ><a href="membersdet.php?letter=O2" title="&Ouml;">&Ouml;</a></td>
  </tr>
   
</table>
<?php 
}

include "menuinclude.php" ; 
?>


</body>
</html>


