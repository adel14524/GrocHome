<?php
include_once 'admin-header.php';
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
			background-color: #ffffff;
			
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
		.all-item{
			margin:20px 250px;
			background-color: #028090;
			border: 1px solid gray;
			border-radius: 10px;
		}
		.label{
			color: white;
		}
		
		.tajuk{
			margin-left: 20px;
            width: ;
		}
		
		.leftcol{
            
			height: 100%;
            padding: 50px ;
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
			background-color: #8de391;
			color: black;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin-bottom: 1rem;
			outline: none;
			
		}

		button:hover {
			background-color: #629e65;
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

		input[type="file"]  {
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
		.addForm,.leftcol,.form {
			width: 100%;
			
		}
		}

		
	</style>
</head>
<body>

	<script type="text/javascript">
		function success() {
			alert("Successfull add new staff ");
			window.location("addStaff.php");
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
			<h1>Add new staff</h1>
		</div>

		<form action="addStaff.php" method="post" enctype="multipart/form-data " onsubmit=" return success()">
		<div class="addForm">

				<div class="leftcol " >
					<div class="col1">
						<div  class="label">Staff ID</div>
						<input type="text" id="Staff_ID" name="Staff_ID" required><br>
					</div>
					
					<div class="col1">
						<div class="label">Name</div>
						<input type="text" name="Staff_Name" required><br>
					</div>

					<div class="col1">
						<div class="label">Position</div>
						<input type="text" name="Staff_Position" required><br>
					</div>

					<div class="col1">
						<div class="label">Email</div>
						<input type="text" name="Staff_Email" required><br>
					</div>
					<div class="col1">
						<div class="label">Phone Number</div>
						<input type="text" name="Staff_PhoneNo"  required><br>
					</div>
				</div>

				
			
		</div>
			
		<div class="addorderBTN">
			<center><button type="submit" value="Add staff" name="submit">ADD STAFF</button></center>
		</div>
	</form>
			  
	</div>

	

</body>
</html>