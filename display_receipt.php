
<!DOCTYPE html>
<html>
<head>
  <title>Receipt</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">

  <style>
    
    

    body{
      font-family: sans-serif;
      margin: 0px;
      padding: 0px;
    }

    a{
      padding-top: 10px;
      text-decoration: none;
    }

    table{
      width: 800px;
    }
    table, th, td{
      border-collapse: collapse;
      padding: 10px;
    }

    tr{
      background-color: #dedede;
    }

    th{
      background-color: #a2e8b5;
    }

    .nav-button{
      padding: 40px;
    }

    .receipt{
      padding-left: 20px;
    }

    .details-receipt{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      padding: 15px;
    }

    .receipt img{
      padding-left: 20px;
      width: 40px;
      height: 40px;
    }

    .print{
      align-items: center;
    }

    .print button{
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

    .table-shopping-chart{
      display: flex;
      flex-direction: column;
      justify-content: center;
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
  </style>
</head>
<body>

<div class="top-nav">
    <div class="bar-nav">
      <a href="search_order.php"><div class="nav-menu-1"><p>SEARCH ORDER</p></div></a>
      <a href="my-account.php"><div class="nav-menu-1"><p>MY ACCOUNT</p></div></a>
      <a href="logOut.php"><div class="nav-menu-1"><p>LOG OUT</p></div></a>
    </div>
</div>

<div class="promotion-tag">
    <p>Don't forget to enter this code to get 10% OFF of your purchase ! PROMO CODE : COVID19</p>
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

<div class="receipt">
  <h1>Checkout Complete - Thank You!</h1>
  <p>Thank you for your order. You can track your order by entering the order ID in the "Search Order" page.</p>
  <p>Please print this receipt for future reference.</p><br>
  <div class="details-receipt paid">
    Paid <img src="img/tick.png">
  </div>
  <div class="details-receipt order id">
    Order ID = <?php echo "123123"?>
  </div>
  <div class="details-receipt order date">
    Order Date = <?php echo "12/12/2020"?>
  </div>
  <div class="details-receipt total payment">
    Total Payment = RM<?php echo "59.90"?>
  </div>
  <div class="details-receipt parcel num">
    Parcel Number = <?php echo "MAS-123123"?>
  </div>
</div>
  
<div class="nav-button">
  <div class="print">
    <button onclick="window.print()"><img src="img/print.png">Print receipt</button>
</div>

<div class="return">
    <button onclick="window.location.href='index.php';">Back to products page</button>
</div>
</div>
</body>
</html>