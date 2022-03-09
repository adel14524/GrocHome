<?php

session_start();
include_once 'dbConn.php';
include_once 'admin-header.php';

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
			padding: 20px;
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
			margin-top: 0%;
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



		.orderid{width: 150px;}
		.email{width: 200px;}
		.date{width: 100px;}
		.receiver{width:  100px;}
		.address{width: 300px;} 
		.parcel-no{width:  150px;}
		.status{width:  50px;}

	</style>
</head>
<body>
	<div class="search-header">
		<form name="search" action="search_order2.php?action=search" method="POST" >
			<h1>Search Order</h1>
			<div class="form-box">
				<input type="email" class="search-field search-email" name="email" placeholder="Customer Email" required>
				<input type="text" class="search-field search-orderid" name="orderid" placeholder="Order ID" required>
				<input type="submit" name="search" value="Search"/ class="search-button">
			</div>
			<br><br>
			
		</form>
	

		<div class="result-table form-box">
			<?php 
				$display_order = "SELECT * FROM `order_list`;";


				$res = mysqli_query($conn,$display_order);
				$count = mysqli_num_rows($res);

				if ($count > 0) {
			?>
				<table>
					<tr>
						<th class='orderid'>Order ID</th>
						<th class='email'>Email</th>
						<th class='date'>Date Purchase</th>
						<th class='receiver'>Receiver</th>
						<th class='address'>Address</th>
						<th class='parcel-no'>Parcel No.</th>
						<th class='status'>Status</th>
						<th></th>
					</tr>
				<?php
					while ($row = mysqli_fetch_array($res)) {
				?>
					<tr>
						<form method="POST" action="search_order.php?action=update">
						<td><?php echo $row['Order_ID'] ;?></td>
						<input type="hidden" name="Order_ID" value="<?php echo $row['Order_ID'] ;?>">
						<td><?php echo $row['Cust_Email'] ;?></td>
						<td><?php echo $row['Order_Date'] ;?></td>
						<td><?php echo $row['Shipping_Name'] ;?></td>
						<td><?php echo $row['Shipping_Address'] ;?></td>
						<td><?php echo $row['Parcel_No'] ;?></td>
						
						<td><select name='status' style='padding: 5px;' placeholder="<?php echo $row['Order_Status'] ;?>">
							<option disabled selected value><?php echo $row['Order_Status'] ;?></option>
							<option value="Processing">Processing</option>
							<option value="To Ship">To Ship</option>
							<option value="To Receive" >To Receive</option>
							<option value="Received">Received</option>
							</select>
						</td>

						<td><input type="submit" name="update-status" value="Update" style="width: 100px;"></td>
						</form>
					</tr>
				<?php
					}
				?>
				</table>
				<?php
				}
				else{
					echo "No Record Found!";
				}

				?>

			<?php
				if (isset($_GET['action'])) {
					if ($_GET['action'] == 'update') {
						$status = $_POST['status'];
						$id = $_GET['Order_ID'];

						$sql = "UPDATE `order_list` SET Order_Status='$status' WHERE Order_ID='$id';";
						$result = mysqli_query($conn,$sql);
					}
				}
			?>
			
		</div>
	</div>
	
</body>
</html>