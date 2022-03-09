<?php

session_start();
include_once 'dbConn.php';
include_once 'customer-header.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome to GH</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
		}

		.search-header{
			
			width: 100%;
			background-size: cover;
			background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('image.jpg');
			background-position: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			font-family: sans-serif;
		}

		h1{
			color: #ffff;
			margin-top: 30px;
			margin-bottom: 50px;
			font-size: 45px;
			letter-spacing: 2px;
			text-align: center;
		}

		.search-field{
			height: 30px;
			padding: 10px;
			border-radius: 25px;
			outline: none;
			font-weight: bold;
			font-size: 14px;
			border: 1px transparent;
			margin-right: 10px;
			text-align: center;
		}

		.search-email{
			width: 400px;
		}

		.search-orderid{
			width: 200px;
		}

		.search-button{
			margin-left: 20px;
		}

		input[type=submit] {
			height: 49px;
			width: 150px;
			background-color : #ffeb3b;
			border : none;
			color: #000;
			border-radius: 25px;
			font-weight: bold;
			font-size: 14px;
		}

		input[type=submit]:hover{
			background-color : #ffc107;
			cursor: pointer;
		}

		.form-box{
			background: rgba(0,0,0,0.5);
			padding: 40px;
		}

		.result-table{
			margin-top: 20px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 50px;
		}

		table{
			border-collapse: collapse;
		}

		th{
			background-color: #edbcb9;
			color: black;
		}

		td{
			background-color: #6e5c5b;
			color: white;
		}

		

		table, th, td{
			padding: 5px;
			text-align: center;
			border: 1px solid black; 

		}



		.prodDesc{width: 400px;}
		.qty{width: 150px;}
		.total-price{width: 200px;}
		.status{width:  200px;}

	</style>
</head>
<body>
	
	<div class="search-header">
		<form name="search" action="customer-search-order.php" method="POST">
			<h1>Search Order</h1>
			<div class="form-box">
				<input type="email" class="search-field search-email" name="email" placeholder="Customer Email" required>
				<input type="text" class="search-field search-orderid" name="orderid" placeholder="Order ID" required>
				<input type="submit" name="search" value="Search"/ class="search-button">
			</div>
			<br><br>
			
		</form>

		<div class="result-table form-box" style="overflow-y: auto;">
				<?php 
				

				if(isset($_POST['search'])){
				$email = $_POST['email'];
				$orderid = $_POST['orderid'];

				$sql="SELECT Order_Status FROM order_List WHERE Order_ID = '$orderid';";
				$db=mysqli_query($conn,$sql);

				$order_status="";
				while($row = mysqli_fetch_array($db)){
					$order_status=$row['Order_Status'];
				}

				$search_order = "SELECT `product`.prod_Desc,`order_product`.Quantity,`order_product`.Total_Price, `order_list`.Order_Status FROM `product` JOIN `order_product` ON `product`.product_ID = `order_product`.Product_ID JOIN `order_list` ON `order_list`.Order_ID=`order_product`.Order_ID WHERE `order_list`.Cust_Email='$email' AND `order_list`.Order_ID='$orderid';";
				$result = mysqli_query($conn, $search_order);

				if(mysqli_num_rows($result) > 0){?>


				<table>
				<tr>
					<td colspan="3"><?php echo "<h2>Your Order ID is ".$orderid." </h2>" ;?></td>
				</tr>
				<tr>
					<td colspan="3"><?php echo "<p><b>Order Status : ".$order_status." </b></p>";?></td>
				</tr>
				<tr>
					<th class="prodDesc">Product Description</th>
					<th class="qty">Quantity</th>
					<th class="total-price">Total Price</th>
					
				</tr>
				<?php
					while ($row = mysqli_fetch_array($result)) { ?>

				<tr>
					<td><?php echo $row['prod_Desc'] ;?></td>
					<td><?php echo $row['Quantity'] ;?></td>
					<td><?php echo $row['Total_Price'] ;?></td>
					
				</tr>
					

				<?php	
					} 
				}else{
					echo "<p style='color:white;'>No Record Found!</p>";
				}
			}

				
				?>
			</table>
		</div>
	</div>
	
</body>
</html>