<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?php 
    $seats=$_POST['seat'];
    $cid=$_POST['cid'];
    $sl_id=$_POST['sl_id'];
    $con = mysqli_connect("localhost", "root", "", "mcc");
    $no=count($seats);
    $mid=mysqli_query($con,"select mid from slot where sl_id=$sl_id");
    $mid=mysqli_fetch_array($mid);
    $mid=$mid['mid'];
    $price=mysqli_query($con,"select mprice from movie where mid=$mid");
    $price=mysqli_fetch_array($price);
    $mprice=$price['mprice'];
    $price=$price['mprice']*$no;

echo'
<h2>Checkout Page</h2>
<p>Select the preferred payment method.</p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="confirmation.php">
        <input type="hidden" name="cid" value="'.$cid.'">
        <input type="hidden" name="sl_id" value="'.$sl_id.'">
        <input type="hidden" name="mprice" value="'.$mprice.'">
        ';
        for($i=0;$i<count($seats);$i++)
            echo '<input type="hidden" name="seat[]" value="'.$seats[$i].'">';
        echo '<div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname"  required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email"  required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address"  required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city"  required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state"  required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip"  required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <img src="credit.PNG" height="40" width="150">
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname"  required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber"  required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth"  required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear"  required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>'.$no.'</b></span></h4>

      <hr>
      <p>Total <span class="price" style="color:black"><b>'.$mprice.'*'.$no.'='.$price.'</b></span></p>
    </div>
  </div>
</div>
' ;?>
</body>
</html>
