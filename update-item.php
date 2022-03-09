<?php
	include_once 'dbConn.php';


	$product_ID = $_POST['product_ID'];
	$add_quantity = $_POST['item_add'];


	$class_items = "SELECT * FROM product WHERE product_ID = '".$product_ID."';";
	$result = mysqli_query($conn, $class_items);

	while ($record = mysqli_fetch_assoc($result)) {
		$total = $record['stock_Qty'] + $add_quantity;
		

		$item_update = "UPDATE product SET stock_Qty = '".$total."' WHERE product_ID = '".$product_ID."';";
		$update_qty = mysqli_query($conn, $item_update);


	}

	echo'<script> alert("Product updated successfully !");';
    echo'window.location="productUpdate.php";';
    echo'</script>';
?>


