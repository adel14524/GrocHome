<?php
 session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>GrocHome</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <script type="text/javascript">
      function validateLI() {
        var x = document.forms["LI"]["email"].value;
        var y = document.forms["LI"]["password"].value;
        if (x == "" && y=="") {
          alert("Please enter your email and password");
          return false;
        }
        else if (x == "") {
          alert("Please enter your email");
          return false;
        }
        else if (y == "") {
          alert("Please enter your password");
          return false;
        }
      }
    </script>
    <div class="cont">
      <div class="form sign-in">
        <center><img class="logo" src="img/Grochome4.png" /></center>
        <h2>Log In</h2>
        <form
          name="LI"
          method="Post"
          action="login.php"
          onsubmit="return validateLI()"
        >
          <label>
            <span>Email Address</span>
            <input type="email" name="email" />
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" />
          </label>
          <button class="submit" type="submit">Sign In</button>
          
        </form>

        <div class="social-media"></div>
      </div>

      <div class="sub-cont">
        <div class="img">
          <div class="img-text m-up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img-text m-in">
            <h2>One of us?</h2>
            <p>
              If you already has an account, just sign in. We've missed you!
            </p>
          </div>
          <div class="img-btn">
            <span class="m-up">Sign Up</span>
            <span class="m-in">Sign In</span>
          </div>
        </div>

        <script type="text/javascript">
          function validateSU() {
            var q = document.forms["SU"]["FN"].value;
            var w = document.forms["SU"]["phone"].value;
            var e = document.forms["SU"]["email"].value;
            var r = document.forms["SU"]["pw"].value;
            var t = document.forms["SU"]["address"].value;
            var y = document.forms["SU"]["city"].value;
            var u = document.forms["SU"]["postcode"].value;
            var i = document.forms["SU"]["state"].value;
           
            if (q == "" ||w == "" ||e == "" ||r == "" ||t == "" ||y == "" ||u == "" ||i == "" ) {
              alert("Please enter all the details");
              return false;
            }
            else{
              alert("Your registration successfully saved.Now you can log in into GrocHome");
              return true;
            }
            
          }
        </script>
        <div class="formSU sign-up">
          <h2 style="line-height: 20px;">Sign Up</h2>
          <form
          name="SU"
          method="Post"
          action="membership.php"
          onsubmit="return validateSU()"
        >
          <div name="SU" style="float: left; margin-top: 10px;">
            <label>
              <span>Full Name</span>
              <input type="text" name="FN" />
            </label>
          </div>

          <div name="SU" style="float: right; margin-top: 10px;">
            <label>
              <span>Phone Number</span>
              <input type="text" name="phone"/>
            </label>
          </div>

          <div name="SU" style="float: left; margin-bottom: 20px;">
            <label>
              <span>Email</span>
              <input type="email" name="email"/>
            </label>
          </div>

          <div name="SU" style="float: right;">
            <label>
              <span>Password</span>
            </label>
            <input type="password" name="pw"/>
          </div>

          <div name="SU" style="margin-right: 500px; margin-top: 10px;">
            <label>
              <span>Address</span>
              <input type="text" name="address"/>
            </label>
          </div>

          <div name="SU" style="float: left; width: 180px;">
            <label
              ><span>City</span>
              <input type="text" style="width: 70%;" name="city"/>
            </label>
          </div>

          <div name="SU" style="float: left; width: 180px; margin-left: 20px;">
            <label
              ><span>Postcode</span>
              <input type="text" style="width: 70%;" name="postcode"/>
            </label>
          </div>

          <div name="SU" style="float: right; width: 180px;">
            <label
              ><span>State</span>
              <input type="text" style="width: 70%;" name="state"/>
            </label>
          </div>
          <button
            style="margin-top: 150px;"
            type="submit"
            class="submit"
          >
            Sign Up Now
          </button>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
