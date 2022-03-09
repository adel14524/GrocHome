<?php
    include 'dbConn.php';
    $FN=$_POST['FN'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $pw=$_POST['pw'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $postcode=$_POST['postcode'];
    $state=$_POST['state'];
    

    $sql= "INSERT INTO membership (cust_Email,cust_Name,cust_PhoneNo,cust_Password,cust_Address,cust_City,cust_PostalCode,cust_State) VALUES ('$email','$FN','$phone','$pw','$address','$city','$postcode','$state')";
    $result=mysqli_query($conn,$sql);

    $query = "SELECT * FROM `membership` WHERE cust_Email='$FN' and cust_Password='$pw'";
	if($query)
    if($result)
    header('Location:signIn-Login.php');
?>