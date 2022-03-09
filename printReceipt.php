<?php
session_start();
include_once'customer-header.php';
include_once 'dbConn.php';
$orderID=$_GET['order'];
if(isset($_GET['action'])){
    if($_GET['action']=='receipt'){
        $sql = "SELECT * FROM order_list WHERE Order_ID='$orderID';";
        $result = mysqli_query($conn, $sql);


        $payment_id = "";
        $current_date = "";
        $total_pay = "";
        $parcel_no = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $payment_id = $row['Order_ID'];
            $current_date = $row['Order_Date'];
            $total_pay = $row['Total_Pay'];
            $parcel_no = $row['Parcel_No'];
	}
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
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

    .receipt{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .display-receipt{
      width: 400px;
      height: 640px;
      display: flex;
      border: 1px solid black;
      border-radius: 20px;
      padding: 10px;
    }

    .all, .display-receipt{
      display: flex;
      flex-direction: column;
    }

    .float-right{
      float: right;
    }

    .detail-receipt{
      margin-top: 20px;
    }
    .detail-gap{
      height: 60px;
    }

    .label{
      font-weight: bold;
      width: 40%;
      text-align: right;
    }

    .label, .detail{
      padding-top: 20px;
    }

    .detail{
      margin-left: 20px; 
      font-weight: bold;
    }

    .paid img{
      margin-top: 10px;
      width: 40px;
      height: 40px;
      margin-left: 30px;
    }
    
    .paid, .order-id, .order-date, .total-payment, .parcel-num{
      display: flex;
      flex-direction: row;
    }
    
    .company-logo{
      margin: 20px;
    }
    .company-logo img{
      width: 90%;
    }

    .button-back-print{
      margin-top: 20px;
      width: 420px;
    }

    .button-back-print button{
      height: 50px;
      padding: 10px 15px;
      opacity: 0.6;
      transition-duration: 0.3s;
    }

    .button-back-print button:hover{
      opacity: 1.0;

    }

    .print{
      align-items: center;
    }
    .print p{
      margin-top: 4px;
    }

    .print button{
      width: 200px;
      background-color:#44c767;
      border-radius:28px;
      border:1px solid #18ab29;
      display:inline-block;
      cursor:pointer;
      color:#ffffff;
      font-family:Arial;
      font-size:17px;
      padding:10px 21px;
      text-decoration:none;
      text-shadow:0px 1px 0px #2f6627;
      float: left;
    }

    .print img{
      display: block;
      width: 30px;
      height: 30px;
      float: left;
    }

    .return button{
      background-color:#44c767;
      border-radius:28px;
      border:1px solid #18ab29;
      display:inline-block;
      cursor:pointer;
      color:#ffffff;
      font-family:Arial;
      font-size:17px;
      padding:10px 21px;
      text-decoration:none;
      text-shadow:0px 1px 0px #2f6627;
      float: right;
    }

	</style>
</head>
<body>

	<div class="receipt">
    <div class="all">
      <div class="display-receipt">
        <div class="thankyou-label">
          <h2>Check Out Complete!</h2>
          <p>Thank you for your order. You can track your order by entering the order ID in the "Search Order" page.<br>Please print this receipt for future reference.</p>
          <p class="float-right"><strong>~~ From GrocHome Sdn. Bhd.</strong></p>
        </div>


        <div class="detail-receipt">
          <div class="paid detail-gap">
            <div class="label">Paid : </div>
            <div><img src="img/tick.png"></div>
          </div>
          <div class="order-id detail-gap">
             <div class="label">Order ID : </div>
             <div class="detail"><?php echo $payment_id;?></div>
          </div>
          <div class="order-date detail-gap">
             <div class="label">Order Date : </div>
             <div class="detail"><?php echo $current_date;?></div>
          </div>
          <div class="total-payment detail-gap">
             <div class="label">Total Payment : </div>
             <div class="detail"><?php echo $total_pay;?></div>
          </div>
          <div class="parcel-num detail-gap">
             <div class="label">Parcel Number : </div>
             <div class="detail"><?php echo $parcel_no;?></div>
          </div>

        </div>
        <div class="company-logo">
          <img src="img/GrocHome4.png">
        </div>
      </div>

      <div class="button-back-print">
        <div class="print">
          <button onclick="window.print() "><img src="img/print.png">
            <p>Print receipt</p>
            </button>
        </div>

        <div class="return">
          <button onclick="window.location.href='customer-profile.php';">return</button>
        </div>
      </div>
    </div>
  </div>
  



</body>
</html>


