<?php

//
// phpCAS simple client
//
//$_SERVER['HTTP_X_FORWARDED_HOST'] = "www.kth.se";
//$_SERVER['REQUEST_URI']="/ece/avdelningen-for-bibliotekstjanster-sprak-och-kommunikation/sprak-och-kommunikation/tandem/admin/log/log.php";
// import phpCAS lib
include_once('../CAS.php');

// initialize phpCAS
phpCAS::client(CAS_VERSION_2_0,'login.kth.se',443,'');

phpCAS::setNoCasServerValidation();

// If you want the redirect back from the login server to enter your application by some 
// specfic URL rather than just back to the current request URI, call setFixedCallbackURL.
// phpCAS::setFixedCallbackURL('http://myserver/my_entry_point.php');
// force CAS authentication
phpCAS::forceAuthentication();
// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// logout if desired
if (isset($_REQUEST['logout'])) {
 phpCAS::logout();
}

// for this test, simply print that the authentication was successfull
?>
<html>
<head>
 <title>phpCAS simple client</title>
</head>
<body>
 <h1>Successfull Authentication!</h1>
 <p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
 <p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>
 <p><a href="">Logout</a></p>
</body>
</html>
<?php
$casUser = phpCAS::getUser();
session_start() ;
$_SESSION['kth_id']  	= $casUser ;
header("location: http://www.kth.se/ece/avdelningen-for-larande/sprak-och-kommunikation/tandem/admin/index2.php") ;
?>