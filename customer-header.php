<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">

	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
		}

		a{
			padding-top: 10px;
			text-decoration: none;
		}

		.top-nav{
			background-color: #f5f5f5;
			height: 70px;
			width: 100%;
			margin: 0px;
		}
		
		.bar-nav{
			margin-right: 250px;
			float: right;
			display: flex;
			flex-wrap: wrap;
		}

		.promotion-tag{
			padding: 2px;
			width: 100%;
			text-align: center;
			background-color: #81e3bc;
		}
		
		.nav-menu-1{
			font-family: 'Francois One', sans-serif;
			color: #969090;
			text-align: center;
			border: 1px transparent;
			width: 120px;
			margin: 10px;
		}
		.nav-menu-1:hover{
			color: #264082; 
		}

		.logo-menu, .logo, .menu, .all-item{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.logo-menu{
			margin: 20px 5px 10px 5px;
			background-color: white;
		}
		.logo-image img{
			height: 150px;
		}
		.menu{
			margin: 15px 5px;
		}
		.menu-class{
			filter:drop-shadow(3px 3px 5px lightgray);
			border-radius: 10px;
			width: 100px;
			height: 100px;
			margin: 5px;
		}
		.meat-seafood{background-color: #ff8e78;}
		.baking-needs{background-color: #ffdb78;}
		.fresh-chilled{background-color: #78ffcb;}
		.house-hold{background-color: #78ddff;}
		
		.menu-class:hover{
			filter:drop-shadow(8px 8px 10px gray);
		}
		.menu-class img{
			margin: 10px;
			width: 80px;
		}
		
	</style>
</head>
<body>

	<div class="top-nav">
		<div class="bar-nav">
			<a href="index.php"><div class="nav-menu-1"><p>PRODUCTS</p></div></a>
			<a href="cart.php"><div class="nav-menu-1"><p>SHOPPING CHART</p></div></a>
			<a href="customer-search-order.php"><div class="nav-menu-1"><p>SEARCH ORDER</p></div></a>
			<a href="myAccount.php"><div class="nav-menu-1"><p>MY ACCOUNT</p></div></a>
			<a href="logOut.php"><div class="nav-menu-1"><p>LOG OUT</p></div></a>
			
		</div>
	</div>

	<div class="promotion-tag">
		<p style="word-spacing: 30px;">Free delivery worldwide		24/7		Anywhere</p>
	</div>

	<div class="logo-menu">
		<div class="logo">
			<div class="logo-image">
				<img src="img/GrocHome4.png">
			</div>
		</div>
		<div class="menu">
			<div class="menu-class meat-seafood">
				<img src="img/meat-1.png">
			</div>
			<div class="menu-class baking-needs">
				<img src="img/baking.png">
			</div>
			<div class="menu-class fresh-chilled">
				<img src="img/fresh-chill.png">
			</div>
			<div class="menu-class house-hold">
				<img src="img/house-hold.png">
			</div>
		</div>

		
	</div>

</body>
</html>