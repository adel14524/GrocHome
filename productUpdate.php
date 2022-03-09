<?php
	include_once 'admin-header.php';
	include_once 'dbConn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>STOCK UPDATE</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			margin:0px;
			padding: 0px;
			font-family: sans-serif;
		}
	
		.new{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.add-new-product{
			width: 800px;
			display: flex;
			flex-wrap: wrap;
			justify-content: flex-end;

		}

		.add-new-product img{
			margin-top: 5px;
			height: 30px;
			width: 30px;
		}

		.add-new-product a{
			display: flex;
			flex-direction: row-reverse;
			text-decoration: none;
			color: white;
		}

		.add-label{
			border-radius: 10px;
			margin-left: -10px;
			text-align: center;
			padding: 10px;
			background-color:  #6abd7a;
		}

		.all-item{
			margin: 50px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.item{
			width: 800px;
			border: 1px solid gray;
			border-radius: 10px;
			display: flex;
			flex-direction: row;
			padding: 10px;
		}

		.item-img img{
			width: 100px;
			height: 100px;
		}

		.item-desc-price-quantity{
			width: 350px;
			margin: 15px 30px;
		}
		
		.item-desc, .item-price, .item-quantity{
			margin-top: 5px;
		}

		.item-update{
			margin: 20px 5px;
		}
		
		.input-num{
			border-radius: 10px;
			text-align: center;
			margin-top: 5px;
			border: 1px solid gray;
			width: 180px;
			height: 30px;
		}

		.button-submit{
			border: 1px transparent;
			box-shadow: 0px 0px 5px lightgray;
			border-radius: 10px;
			height: 30px;
			width: 100px;
			margin-top: 5px;
			margin-left: 40px;
			background-color: #6abd7a;
			color: white;
		}

		.button-submit:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 5px black;
		}
	</style>
</head>
<body>

	<div class="title-page">
		<center><h1>STOCK UPDATE</h1></center>
	</div>

	<div class="new">
		<div class="add-new-product">
			<div class="add-button">
				<a href="addProduct.php">
					<div class="add-label">Add New Product</div>
					<img src="img/add.png">
				</a>
			</div>
		</div>
	</div>


	<div class="update-form">
		
		<?php
			$class_items = "SELECT * FROM product;";
			$result = mysqli_query($conn, $class_items);

			while ($record = mysqli_fetch_assoc($result)) {
				
		?>
			
			<div class="all-item">
				<form method="POST" action="update-item.php">
					<div class="item">

						<div class="item-img">
							<img src="<?php echo $record['prod_Img']; ?>">
						</div>

						<div class="item-desc-price-quantity">
							<div>Item Code : <?php echo $record['product_ID']; ?></div>
							<div class="item-desc"><?php echo $record['prod_Desc']; ?></div>
							<div class="item-price">RM <?php echo $record['prod_Price']; ?></div>
							<div class="item-quantity">Quantity Left : <?php echo $record['stock_Qty']; ?></div>
						</div>

						<div class="item-update">
							<input type="hidden" name="product_ID" value="<?php echo $record['product_ID']; ?>">
							<input type="number" name="item_add" class="input-num" min="0" placeholder="Enter additional ammount"><br>
							<button type="submit" class="button-submit"> Update</button>
						</div>
						
					</div>
				</form>
			</div>


		<?php
			}
		?>
	

	</div>
			
</body>
</html>