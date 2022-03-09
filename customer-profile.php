<?php
session_start();
	include_once 'dbConn.php';
	include_once 'customer-header.php';


	$email_cust = $_SESSION['cust_Email'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
		}
		.main-box{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 50px;
		}

		.my-account{
			margin: 10px 30px;
			box-shadow: 0px 0px 20px darkgray;
			border-radius: 20px;
			height: 600px;
			width: 500px;
			border: 1px solid black;
		}

		.my-account-box, .details{
			display: flex;
			flex-direction: column;
			margin: 5px;
		}

		.title-myaccount{
			text-align: center;
			height: 55px;
			width: 400px;
		}

		.part-detail{
			margin: 10px 0px;
			display: flex;
			flex-direction: row;
		}

		.label{width: 150px; padding: 10px; }
		.data-cust{width: 300px;}

		.data-cust input{
			color: black;
			font-weight: bold;
			width: 250px;
			background-color: #f2efe4;
			border: 1px transparent;
			border-radius: 10px;
			padding: 5px 7px;
		}

		.form-button{
			margin: 20px;
			display: flex;
			flex-direction: row;
		}

		.reset-button button, .update-button button{
			height: 40px;
			border: 1px transparent;
			border-radius: 10px;
			margin-left: 30px;
			padding: 0px 15px;
			color: white;
			transition-duration: 0.3s;
		}

		.reset-button button{
			background-color: #c97a73;
		}

		.update-button button{
			background-color: #73c974;
		}

		.reset-button button:hover, .update-button button:hover{
			opacity: 0.9;
			color: black;
			box-shadow: 0px 0px 5px black;
		}

		.order-history{
			margin: 10px 30px;
			border: 1px solid black;
			border-radius: 20px;
			box-shadow: 0px 0px 20px darkgray;
			width: 600px;
			height: 600px;
			display: flex;
			flex-direction: column;
		}

		.title-order-history{
			padding-bottom: 10px;
			text-align: center;
		}
		
		.table-order-history{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin: 10px;
			overflow-y:auto;
		}

		table, th, td{
			text-align: center;
			border-collapse: collapse;
		}

		tr{
			border: 1px solid black;
		}
		.order-id{
			background-color: #8de391;
		}

		th, td{
			width: 200px;
			height: 40px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}

		a{
			color: black;
		}

	</style>
</head>
<body>

	<div class="main-box">
		<div class="my-account">
			<div class="my-account-box">
				<div class="title-myaccount">
					<h3>My Account</h3>
				</div>
				<form method="POST" action="customer-profile.php?action=edit">
				<?php

				$sql = "SELECT * FROM membership WHERE cust_Email = '$email_cust';";
				$result = mysqli_query($conn, $sql);

				$email = $name = $phone = $address = $city = $poscode = $state = "";

				while ($record = mysqli_fetch_assoc($result)) {
					$email = $record['cust_Email'];
					$name = $record['cust_Name'];
					$phone = $record['cust_PhoneNo'];
					$address = $record['cust_Address'];
					$city = $record['cust_City'];
					$poscode = $record['cust_PostalCode'];
					$state =$record['cust_State'];
				}

				?>
					<div class="details">
						<div class="part-detail">
							<div class="label">Your Email </div>
							<div class="data-cust">: 
								<?php echo $email ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Your Name </div>
							<div class="data-cust">: 
								<input type="text" name="name" placeholder="<?php echo $name ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Phone Number </div>
							<div class="data-cust">: 
								<input type="text" name="phoneNo" placeholder="<?php echo $phone ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Address </div>
							<div class="data-cust">: 
								<input type="text" name="address" placeholder="<?php echo $address ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">City </div>
							<div class="data-cust">: 
								<input type="text" name="city" placeholder="<?php echo $city ;?>"required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Poscode </div>
							<div class="data-cust">: 
								<input type="text" name="poscode" placeholder="<?php echo $poscode ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">State </div>
							<div class="data-cust">: 
								<input type="text" name="state" placeholder="<?php echo $state ;?>" required>
							</div>
						</div>
						
					</div>

					<input type="hidden" name="email" value="<?php echo $email ;?>">

					<div class="form-button">
						<div class="reset-button">
							<button type="reset" value="Reset">Reset</button>
						</div>
						<div class="update-button">
							<button type="submit" value="edit">Update My Account</button>
						</div>
					</div>

				</form>
			</div>
		</div>


		<div class="order-history">
			<div class="title-order-history">
				<h3>Order History</h3>
			</div>
			<div class="table-order-history">

				<?php 
				$sql = "SELECT * FROM order_list WHERE Cust_Email = '$email_cust'";
				$result = mysqli_query($conn, $sql);
				if($result->num_rows > 0){

				?>

				<table>
					<tr>
						<th>Order ID</th>
						<th>Total Payment</th>
						<th>Payment Method</th>
					</tr>
					
				

				<?php

				while ($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td class="order-id"><a href="printReceipt.php?action=receipt&order=<?php echo $row['Order_ID']?>" ><?php echo $row['Order_ID']?></a></td>
						<td><?php echo $row['Total_Pay']?></td>
						<td><?php echo $row['Payment_Method']?></td>
					</tr>


				<?php
				}

				?>

				</table>

				<div class="message">
					<p>You may click any Order ID number to check the receipt.</p>
				</div>

				<?php }
				else 
					echo "<div class = 'message'><p>No order from you yet. :(</p></div>";
				?>
			</div>
		</div>
	</div>

</body>
</html>

<?php
	include_once 'dbConn.php';
	
	if(isset($_GET['action'])){
		if($_GET['action'] == "edit"){
			$email_cust = $_POST['email'];
			$new_name = $_POST['name'];
			$new_phoneNo = $_POST['phoneNo'];
			$new_address = $_POST['address'];
			$new_city = $_POST['city'];
			$new_poscode = $_POST['poscode'];
			$new_state = $_POST['state'];

			$sql = "UPDATE membership SET cust_Name='$new_name',cust_PhoneNo='$new_phoneNo', cust_Address='$new_address', cust_City='$new_city', cust_PostalCode='$new_poscode', cust_State='$new_state' WHERE cust_Email='$email_cust';";
			$result = mysqli_query($conn, $sql);

			$ship_address = $new_address.", ".$new_poscode." ".$new_city.", ".$new_state;
			$sql = "UPDATE order_list SET Shipping_Name='$new_name',Shipping_Address='$ship_address' WHERE Cust_Email='$email_cust';";
			$result = mysqli_query($conn, $sql);

			echo '<script>alert("Your Profile has been UPDATED!")</script>';
            echo '<script>window.location="customer-profile.php"</script>';
		}
	}

?>

