<?php
        include 'dbConn.php';
        $prodID=$_POST['prodID'];
        $prodInfo_ID=$_POST['prodInfoID'];
	    $prodDesc=$_POST['prodDesc'];
	    $quantity=$_POST['quantity'];
	    $prodPrice=$_POST['prodPrice'];
	    $fileToUpload='prod-img/'.$_POST['fileToUpload'];

	    $sql= "INSERT INTO product (product_ID,prodInfo_ID, prod_Desc, stock_Qty, prod_Price, prod_Img) VALUES ('$prodID','$prodInfo_ID','$prodDesc','$quantity','$prodPrice','$fileToUpload')";
        $result=mysqli_query($conn,$sql);
        
        header('Location:addProduct.php');

	?>