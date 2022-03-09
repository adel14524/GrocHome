<?php
	session_start();

	include_once 'dbConn.php';
	
	
    $Staff_ID=$_POST['Staff_ID'];
    $Staff_Name=$_POST['Staff_Name'];
    $Staff_Position=$_POST['Staff_Position'];
    $Staff_Email=$_POST['Staff_Email'];
    $Staff_PhoneNo=$_POST['Staff_PhoneNo'];
    

    $sql= "INSERT INTO staff (Staff_ID,Staff_Name,Staff_Position,Staff_Email,Staff_PhoneNo) VALUES ('$Staff_ID','$Staff_Name','$Staff_Position','$Staff_Email','$Staff_PhoneNo')";
    $result=mysqli_query($conn,$sql);

    header('Location:staff.php')
?>