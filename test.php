<?php
    include_once 'dbConn.php';
    include_once 'h-admin.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome To GH</title>
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<meta charset=utf-8 />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
			height: 900px;
			background-color: #fff;
			
		}

		
		.all-item{
			margin:20px 250px;
			background-color: #2a9d8f;
			border: 1px solid gray;
			border-radius: 10px;
		}
		.tajuk{
			margin-left: 20px;
		}
		.addForm{
			width: auto;
			padding: 20px;
			height: 400px;

		}
		.leftcol,.rightcol{
			width: 45%;
			float: left;
			padding: 20px;
			height: 100%;
		}
		
		.rightcol{
			padding: 20px;
			margin-left: 15px;
		}
		.input-col2{
			margin-top: 20px;
		}
		.input-col2 .gambar .logo{
			position: absolute;
  			top: 50%;
			left: 65%;
			width: 48px;
			height: 48px;
		}
		.input-col2-BTN{
			margin-top: 10px;
			width: auto;
			
		}
		button{
			width: 950px;
			height: 50px;
			background-color: #d90429;
			color: #e6e6ea;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin-bottom: 1rem;
			outline: none;
			
		}
		.gambar{
			border: 50px;
			height: 250px;
			width: auto;
			background-image: url("upload.png");
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-color: #fff;
			border: 1px solid gray;
			border-radius: 10px;
		}
		.addorderBTN{
			width: auto;
			margin: 40px;
			
		}
		
		
		/* Clear floats after the columns 
		.addForm:after {
		content: "";
		display: table;
		clear: both;
		}*/
		
		input[type=text], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}
		input[type="file"] {
		height: 0;
		overflow: hidden;
		width: auto;
		}

		input[type="file"] + label {
		background: #d90429;
		border: none;
		border-radius: 5px;
		color: #fff;
		cursor: pointer;
		display: inline-block;
		font-family: 'Poppins', sans-serif;
		font-size: inherit;
		font-weight: 600;
		margin-bottom: 1rem;
		outline: none;
		padding: 1rem 50px;
		position: relative;
		transition: all 0.3s;
		vertical-align: middle;
		
		
		@media screen and (max-width: 600px) {
		.addForm {
			width: 100%;
			
		}
		}
		
	</style>
</head>
<body>
	<script type="text/javascript">
		function success() {
			alert("Successfull add new product ");
			window.location("addProduct.php");
		  }
		function appear(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah')
						.attr('src', e.target.result)
						.width(400)
						.height(250);
				};

				reader.readAsDataURL(input.files[0]);
			}
		} 
		
	  </script>
	
	
		
	<div class="all-item">
		
		<div class="tajuk">
			<h1>Add new Stadium</h1>
		</div>

		<form action="addItem.php" method="POST" enctype="multipart/form-data " onsubmit=" return success()">
		<div class="addForm">

				<div class="leftcol ">
					<div class=input-col1>
						<label for="prodId">Product ID</label>
						<input type="text" id="prodID" name="prodID" required><br>
					</div>
					<div class=input-col1>
						<label for="prodId">Product Category</label>
						<select id="prodId" name="prodInfoID">
							<option value="prod01">Meat & Seafood</option>
							<option value="prod02">Baking Needs</option>
							<option value="prod03">Fresh & Chilled</option>
							<option value="prod04">House Hold</option>
						</select><br>
					</div>
					<div class="input-col1">
						<label for="prodId">Product Description</label>
						<br><input type="text" name="prodDesc" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">Quantity</label>
						<input type="text" name="quantity" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">Product Price</label>
						<input type="text" name="prodPrice" placeholder="RM" required><br>
					</div>
				</div>

				<div class="rightcol" >
					<center>
					<div class="input-col2">
						<div class="gambar">
							<img id="blah" src="#"  />
						</div>
					</div>
					<div class="input-col2-BTN">
						<input type="file" name="fileToUpload" id="fileToUpload" onchange="appear(this)" required>

						<label for="fileToUpload">Upload Product</label>
					</div>
					</center>
				</div>
				
			<div class="addorderBTN">
			<center><button type="submit" value="Add product" name="submit">ADD PRODUCT</button></center>
		</div>
		</div>
			
		
	</form>
			  
	</div>


</body>
</html>