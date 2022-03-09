<?php
	session_start();

	include_once 'customer-header.php';
	include_once 'dbConn.php';
	$sql_prod="SELECT * FROM product;";
	$result_prod=mysqli_query($conn,$sql_prod);

	while($row_prod=mysqli_fetch_assoc($result_prod)){
		if($row_prod['stock_Qty']<0)
		{
		$prodID=$row['product_ID'];
		$sql_upd="UPDATE product SET stock_Qty=0 WHERE product_ID = '$prodID';";
		$result=mysqli_query($conn,$sql_upd);
		}
	}

	if(isset($_POST['add'])){
		if(isset($_SESSION['cart'])){
			$item_array_id = array_column($_SESSION['cart'], 'id');
			if (!in_array($_GET['id'], $item_array_id)) {

				$count = count($_SESSION['cart']);
				$item_array = array(
					'productid' => $_GET['id'],
					'item_img' => $_POST['hidden_img'],
					'item_desc' => $_POST['hidden_desc'],
					'product_price' => $_POST['hidden_price'],
					'item_quantity' => $_POST['quantity'],
				);

				$_SESSION['cart'][$count] = $item_array;
				echo '<script>window.location="index.php"</script>';

			}else{

                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="index.php"</script>';

            }
		}else{
            $item_array = array(
                'productid' => $_GET["id"],
                'item_img' => $_POST['hidden_img'],
				'item_desc' => $_POST['hidden_desc'],
				'product_price' => $_POST['hidden_price'],
				'item_quantity' => $_POST['quantity'],
            );
            $_SESSION["cart"][0] = $item_array;
        }
	}

	if (isset($_GET['action'])){
        if ($_GET['action'] == "delete"){
            foreach ($_SESSION['cart'] as $keys => $value){
                if ($value['productid'] == $_GET["id"]){
                    unset($_SESSION['cart'][$keys]);
                    echo '<script>alert("PRODUCT HAS BEEN REMOVED FROM YOUR SHOPPING CHART")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To GH</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
		}
		
		.all-item{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.item-section{
			border: 1px transparent;
			margin: 15px;
			padding: 10px;
		}

		.item-type-name{
			border: 1px transparent;
			box-shadow: 3px 3px 5px lightgray;
			border-radius: 10px;
			text-align: center;
			margin: 10px 0px;
			padding: 10px;
		}

		.item{
			margin: 10px;
			padding: 10px;
			width: 200px;
			height: 325px;
			border: 1px solid lightgray;
			border-radius: 5px;
		}

		.item:hover{
			box-shadow: 0px 0px 5px gray;
		}

		.item-img img{
			margin: 5px;
			width: 140px;
			height: 140px;
		}

		.item-caption{
			margin: 10px 5px;
			height: 40px;
		}
		.item-price{
			height: 25px;
			padding-top: 10px;
			font-size: 15px;
			color: #3fbf48;
			margin: 10px 5px 0px 5px;
		}

		.item-status{
			margin-top: 10px;
			font-family: 'Balsamiq Sans', cursive;
			border-radius: 7px;
			padding-top: 8px;
			border: 1px transparent;
			width: 100px;
			height: 25px;
		}

		.available{
			font-size: 15px;
			color: white;
			background-color: #65cf6c;
		}

		.sold-out{
			font-size: 15px;
			color: white;
			background-color: #de4f35;
		}

		.add-to-cart{
			margin-top: 10px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.num-order{
			margin: 0px 5px;
			text-align: center;
			width: 250px;
			height: 30px;
			border: 1px solid lightgray;
			border-radius: 10px;
		}

		.add-button{
			width: 100px;
			height: 25px;
			margin-top: 7px;
			border-radius: 10px;
			border: 1px transparent;
			background-color: #65cf6c;
			color: white;
			box-shadow: 0px 0px 10px lightgray;
		}

		.add-button:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 7px black;
		}

		.item-cart{
			display: flex;
			flex-direction: row;
		}

		.item-cart img{
			margin: 5px;
			width: 140px;
			height: 140px;
		}

		.shopping-cart-button{
			display: flex;
			flex-direction: row;
			justify-content: center;
			margin-bottom: 50px;
		}

		
		.shop-cart{
			width: 800px;
			display: flex;
			flex-wrap: wrap;
			justify-content: flex-end;

		}

		.shop-cart img{
			margin-top: 5px;
			height: 30px;
			width: 30px;
		}

		.shop-cart a{
			display: flex;
			flex-direction: row-reverse;
			text-decoration: none;
			color: white;
		}

		.cart-label{
			border-radius: 10px;
			margin-left: -10px;
			text-align: center;
			padding: 10px;
			background-color:  #6abd7a;
		}
		.cart-icon{
			height: 40px;
			width: 40px;
			background-color: #6abd7a;
			border-radius: 50%;
		}
	</style>

</head>
<body>
	
	<div class="all-item">
		<?php
			$item_type = array("Meat & Seafood", "Baking Needs", "Fesh & Chilled", "House Hold");
			$item_color = array('meat-seafood', 'baking-needs', 'fresh-chilled', 'house-hold');
			$class_sequence = array('ms%', 'bn%', 'fc%', 'hh%');

			for ($i=0; $i < 4; $i++) { 
				$class_items = "SELECT * FROM product WHERE product_ID LIKE '".$class_sequence[$i]."';";
				$result = mysqli_query($conn, $class_items); ?>

				<div class="item-section">
					<div class="item-type-name <?php echo $item_color[$i] ?>"><?php echo $item_type[$i] ?></div>

				<?php 
				while ($record = mysqli_fetch_assoc($result)) { 
				?>

				<form method="POST" action="index.php?action=add&id=<?php echo $record['product_ID']; ?>">

					<div class="item">
						<center>
							<div class="item-img">
							<img src="<?php echo $record['prod_Img']; ?>">
							</div>
						</center>

					<div class="item-caption"><?php echo $record['prod_Desc']; ?></div>
						<div class="item-price">RM <?php echo $record['prod_Price']; ?></div>


					<?php
					if($record['stock_Qty'] > 0){ ?>
						<div class="add-to-cart">

							<input type="hidden" name="hidden_img" value="<?php echo $record['prod_Img']; ?> ">
							<input type="hidden" name="hidden_desc" value="<?php echo $record['prod_Desc']; ?> ">
							<input type="hidden" name="hidden_price" value="<?php echo $record['prod_Price']; ?>">

							<input type="number" name="quantity" id="myOrder" class="num-order" min="0" max="<?php echo $record['stock_Qty']; ?>" placeholder="Enter the quantity">
							<input type="submit" name="add" value="Add to Cart" class="add-button">
						</div>
					<?php
					}
					else{ ?>
						<center><div class="item-status sold-out">SOLD OUT</div></center>
					<?php
					}
					?>	

					</div>
				</form>

					<?php

				}

				?>
				</div>
				<br>

		<?php
			}

		?>


	</div>

	<div class="shopping-cart-button">
		<div class="shop-cart">
			<div class="cart-button">
				<a href="cart.php">
					<div class="cart-label">to Shopping Cart</div>
					<div class="cart-icon"><img src="img/cart.png"></div>
				</a>
			</div>
		</div>

		
		
	</div>
	

	
</body>
</html>