<?php
session_start();
include_once 'dbConn.php';
?>
<?php
//update payment
    $payment_id = 'GH-'.time();
    $current_date = date("Y-m-d");
    $total_pay=$_SESSION["total"];
    $payment_method ="";
    

    if(isset($_GET['action'])){
		if($_GET['action'] == "card"){
            $name = $_POST['Name'];
	        $cc_no = $_POST['CC_Number'];
	        $month = $_POST['Month'];
	        $year = $_POST['Year'];
	        $ccv = $_POST['CVV'];
			$payment_method = 'Credit Card';
			$payment_sql = "INSERT INTO payment (Payment_ID, Name, CC_Number, Month, Year, CVV, Date_Pay, Total_Pay, Payment_Method, Bank_Type) VALUES ('$payment_id', '$name', '$cc_no', '$month', '$year', '$ccv', '$current_date', '$total_pay', '$payment_method', 'None');";
            $db = mysqli_query($conn, $payment_sql);
            
        }
    }
    if(isset($_GET['action'])){
        if($_GET['action']=="online"){
            $bank=$_POST["bank"];
            $payment_method = 'Online banking';
            $payment_sql = "INSERT INTO payment (Payment_ID, Name, CC_Number, Month, Year, CVV, Date_Pay, Total_Pay, Payment_Method, Bank_Type) VALUES ('$payment_id', 'None', 'None', 'None', 'None', 'None', '$current_date', '$total_pay', '$payment_method', '$bank');";
            $db = mysqli_query($conn, $payment_sql);
            
        }
    }
    ?>

    <?php
    // update table product
    $item_buy = "SELECT * FROM temp;";
	$result = mysqli_query($conn, $item_buy);

	$total_pay = 0.0;

	while($record = mysqli_fetch_assoc($result)){
		$product_id = $record['Product_ID'];
	    $quantity = $record['Quantity'];
	    $total_price = $record['Total_Price'];

	    $total_pay += $total_price;

	    $item_product = "SELECT * FROM product WHERE product_ID = '$product_id';";
	    $result_product = mysqli_query($conn, $item_product);

	    $current_Stock = 0;

	    while ($record_product = mysqli_fetch_assoc($result_product)) {
	    	$current_Stock = $record_product['stock_Qty'];
	    }

	    $new_stock = $current_Stock - $quantity;

	    $update_product = "UPDATE product SET stock_Qty = '$new_stock' WHERE product_ID = '$product_id';";
	    $result_update_product = mysqli_query($conn, $update_product);

    }
    ?>

    <?php
    //UPDATE ORDER_LIST

        $email=$_SESSION["cust_Email"];
        $member = "SELECT * FROM membership WHERE cust_Email = '$email';";
        $mem_result = mysqli_query($conn, $member);

        $ship_name = '';
        $address = '';
        $city = '';
        $poscode = '';
        $state = '';

        while ($row = mysqli_fetch_assoc($mem_result)) {
            $ship_name = $row['cust_Name'];
            $address = $row['cust_Address'];
            $city = $row['cust_City'];
            $state = $row['cust_State'];
            $poscode = $row['cust_PostalCode'];
        }

        
        $parcel_no = 'MAS-'.rand(10000,99999).'-GH';
        $ship_address = $address.", ".$poscode." ".$city.", ".$state;
        
        $payment_sql = "INSERT INTO order_list (Order_ID, Cust_Email, Total_Pay, Order_Date, Payment_Method, Shipping_Name, Shipping_Address, Parcel_No, Order_Status) VALUES ('$payment_id', '$email', '$total_pay', '$current_date', '$payment_method', '$ship_name', '$ship_address', '$parcel_no', 'Processing');";
        $db = mysqli_query($conn, $payment_sql);
    ?>

    <?php
    //UPDATE ORDER_PRODUCT

        $ambil="SELECT * FROM temp";
        $boh=mysqli_query($conn, $ambil);
        
        $count=0;

        while ($row = mysqli_fetch_assoc($boh)) {
        $Product_ID = $row['Product_ID'];
        $Quantity = $row['Quantity'];
        $Total_Price = $row['Total_Price'];
        
        $update="INSERT INTO order_product (Order_ID,Product_ID,Quantity,Total_Price) VALUES ('$payment_id','$Product_ID','$Quantity','$Total_Price')";
        $db=mysqli_query($conn,$update);
        }
        

    ?>

    
    <?php
    include_once('customer-header.php');
    include_once('display-receipt.php');
    ?>


