<?php
    session_start();
    include 'dbConn.php';
    $FNcheck="";
    $PWcheck="";
    
    $_SESSION["cust_Email"] = $_POST['email'];
    
          

    if (isset($_POST['email']) and isset($_POST['password'])){
	
        // Assigning POST values to variables.
        $FN=$_POST['email'];
        $PW=$_POST['password'];
        
        if($FN=="gc@admin.com" && $PW=="gcadmin1"){
            $query = "SELECT * FROM `membership` WHERE cust_Email='$FN' and cust_Password='$PW'";
         
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            
            if ($result){
            
            //echo "Login Credentials verified";
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Admin Login Credentials verified");'; 
            echo 'window.location= "productUpdate.php";';
            echo '</script>'; 
            //header('Location:product.php');
            }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("salah");'; 
            echo 'window.location= "signIn-Login.php";';
            echo '</script>'; 
            }
        }else{
                // CHECK FOR THE RECORD FROM TABLE
            $query = "SELECT * FROM `membership` WHERE cust_Email='$FN' and cust_Password='$PW'";
            
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            
            if ($count == 1){
            
            //echo "Login Credentials verified";
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Login Credentials verified");'; 
            echo 'window.location= "index.php";';
            echo '</script>'; 
            //header('Location:product.php');
            }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Invalid Login Credentials");'; 
            echo 'window.location= "signIn-Login.php";';
            echo '</script>'; 
            }
        }
        


    }

    
?>
