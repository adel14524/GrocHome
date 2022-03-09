<?php
	session_start();


	include_once 'customer-header.php';
	include_once 'dbConn.php';

	//clear table temp
	$clear="DELETE FROM temp";
	$db=mysqli_query($conn, $clear);

	$total='';
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

<?php 
error_reporting(0);
$hurm="";
if($_SESSION['cust_Email'] == null) { 
	$hurm="";
	}
else
	$hurm=$_SESSION['cust_Email'];

?>



<!DOCTYPE html>
<html>
<head>
	<title>SHOPPING CHART</title>
	<link href="https://fonts.googleapis.com/css2?family=Kadwa:wght@700&display=swap" rel="stylesheet">
	<style type="text/css">

		body{
			margin:0px;
		}

		.table-shopping-chart{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		table{
			width: 800px;
		}
		table, th, td{
			
			border: 1px transparent
		}

		th{
			height: 50px;
			border-radius: 20px;
			background-color: #a2e8b5;
		}

		.each-item:hover{
			background-color: #dfe6e1;
			background-color: #e1f2e6;
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
		.item-desc{
			margin: 60px 10px;
		}

		.delete-button{
			height: 50px;
			width: 50px;
			background-color: #ff8e78;
			border-radius: 10px;
		}

		.delete-button:hover{
			box-shadow: 0px 0px 5px black;
			background-color: darkgray;
		}

		.delete-button img{
			margin: 10px;
			width: 30px;

		}
		
		.no-item{
			padding: 10px;
			height: 50px;
			width: 100%;
			text-align: center;
			background-color: #ff8e78;
		}

		.total-price{
			background-color: #78ffcb;
			height: 50px;
		}

		.buttons{
			margin: 40px 0px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.button-to{
			width: 230px;
			height: 60px;
			opacity: 0.6;
			transition-duration: 0.3s;
		}

		.button-to a{
			text-decoration: none;
			color: white;
		}

		.button-to:hover{
			opacity: 1.0;
			color: black;
		}

		.product-button, .payment-button{
			display: flex;
			flex-direction: row-reverse;
		}

		.product-label, .payment-label{
			margin-left: -10px;
			text-align: center;
			width: 170px;
			height: 60px;
			background-color: #52b362;
			border-radius: 20px;
			border: 1px solid gray;
		}

		.product-label p, .payment-label p{
			margin-top: 20px;
		}

		.product-icon, .payment-icon {
			width: 60px;
			height: 60px;
			border-radius: 50%;
			box-shadow: 0px 0px 5px black;
		}

		.product-icon{background-color: #22c2e6;}
		.payment-icon{background-color:  #78ffcb;}

		.product-icon img, .payment-icon img{
			margin: 15px;
			width: 30px;
			height: 30px;
		}

		.total-label{
			 background-color:  #52b362;
			 font-family: 'Kadwa', serif;
			 color: white;
		}

		button{
			margin-left: -10px;
			text-align: center;
			width: 170px;
			height: 60px;
			background-color: #52b362;
			border-radius: 20px;
			border: 1px solid gray;
			color: white;
		}


	</style>
</head>
<body>

	<div class="shopping-chart">
		<h1 class="page-title"><center>SHOPPING CHART</center></h1>
		<div class="table-shopping-chart">
			<table>
				
				<?php
					if(!empty($_SESSION['cart'])){
							$total = 0; 
				?>
				<tr>
					<th width="450px">Item</th>
					<th width="100px">Price</th>
					<th width="100px">Quantity</th>
					<th width="150px">Total Price</th>
					<th width="180px">Remove Item</th>
				</tr>

				<?php
					foreach($_SESSION['cart'] as $key => $value){
				?>
					<tr class="each-item">
						<td class="item-cart item-img-desc">
							<div class="item-img">
								<img src="<?php echo $value['item_img'];  ?>">
							</div>
							<div class="item-desc">
								<?php echo $value['item_desc']; ?>
							</div>
						</td>
						<td align="center" class="item-price">
							<?php echo $value['product_price']; ?>
						</td>
						<td  align="center" class="item-quantity">
							<?php echo $value['item_quantity']; ?>
						</td>
						<td  align="center" class="item-total">
							RM <?php echo number_format($value['item_quantity'] * $value['product_price'], 2); ?>
						</td  align="center">
						<td  align="center" class="delete">
							<div class="delete-button">
								<a href="cart.php?action=delete&id=<?php echo $value['productid']; ?>">
									<div>
										<img src="img/trash.png" alt="DELETE ITEM">
									</div>
								</a>
							</div>				
						</td>
					</tr>

				<?php
				$total = $total + ($value['item_quantity'] * $value['product_price']);
				}
				?>
						<tr class="total-price">
							<td></td>
							<td colspan="2" align="right" class="total-label">TOTAL :     </td>
							<td align="center" class="total-label">RM <?php echo number_format($total, 2)  ?></td>
							<td></td>
						</tr>
						
				<?php
				}else{
				?>
					<div class="no-item">
						<h3>NO ITEM ADDED</h3>
					</div>

				<?php } ?>
				</table>
			</div>
			
	</div>
					<?php $_SESSION['total']=$total; ?>
					

	<div class="buttons">
					
		<div class="button-to">
			<a href="index.php">
				<div class="product-button">
					<div class="product-label"><p>Continue Shopping</p></div>
					<div class="product-icon"><img src="img/product.png"></div>
				</div>
			</a>
		</div>

		<?php if($hurm == null) { ?>

		<div class="button-to">
			<a href="signIN-Login.php">
				<div class="payment-button ">
					<div class="payment-label"><p>Proceed to Payment</p></div>
					<!--<button onclick='check()'><a href="payment.php?action=bayar"><p>Proceed to Payment</p></a></button> -->
					<div class="payment-icon"><img src="img/payment.png"></div>
				</div>
			</a>
		</div>

		<?php } else { ?>

		<div class="button-to">
			<a href="payment.php?action=bayar">
				<div class="payment-button ">
					<div class="payment-label"><p>Proceed to Payment</p></div>
					<!--<button onclick='check()'><a href="payment.php?action=bayar"><p>Proceed to Payment</p></a></button> -->
					<div class="payment-icon"><img src="img/payment.png"></div>
				</div>
			</a>
		</div>

		<?php } ?>
		
		
	</div>

	

</body>
</html>