<?php
require_once "config.php";
session_start();
session_destroy() ;
header("location: $kth_auth_endpoint/oauth2/logout");
?>