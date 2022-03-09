<?php

session_start();
include 'dbConn.php';

error_reporting(0);
if($_SESSION['cust_Email']==null)
{
    header('Location:signIn-Login.php');
    
}
else{
    header('Location:customer-profile.php');
}
?>