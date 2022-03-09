<!DOCTYPE html>
<html>
<head>
	<title>Online Banking</title>

	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			font-family: sans-serif;
		}

		.online-banking-box{
			margin: 200px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		

		.display-bank{
			justify-content: flex;
			flex-direction: column;
		}
		.bank-options{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.bank-method-title{text-align: center;}
		.bank.button{
			border: 1px transparent;
			background-color: transparent;
		}
		.bank{margin: 20px;}

		.bank:hover{
			filter: drop-shadow(0px 0px 10px black);
		}

		.bank img{
			border-radius: 50%;
			width: 100px;
			height: 100px;
		}
	</style>
</head>
<body>

	<div class="online-banking-box">
		<div class="display-bank">
			<div class="bank-method-title"><h3>Payment Via Online Banking</h3></div>
			<form action="receipt.php" method="POST">

				<div class="bank-options">
					<div class="bank">
						<button type="submit" name="bank" value="Maybank">
							<img src="img/maybank.png">
						</button>
						
					</div>
					<div class="bank">
						<button type="submit" name="bank" value="BSN">
							<img src="img/bsn.png">
						</button>
						
					</div>
					<div class="bank">
						<button type="submit" name="bank" value="Bank Islam">
							<img src="img/bankislam.png">
						</button>
						
					</div>
				</div>

				<div class="bank-options">
					<div class="bank">
						<button type="submit" name="bank" value="AM Bank">
							<img src="img/ambank.jpg">
						</button>
						
					</div>
					<div class="bank">
						<button type="submit" name="bank" value="CIMB Bank">
							<img src="img/cimb.png">
						</button>
						
					</div>
					<div class="bank">
						<button type="submit" name="bank" value="Hong Leong Bank">
							<img src="img/hongbank.jpg">
						</button>
						
					</div>
				</div>
			</form>
		</div>
		
		
	</div>



</body>
</html>