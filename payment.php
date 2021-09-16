<?php
  require_once('vendor/autoload.php');
   include 'rsc/config/connection.php';
   $id = $_GET['id'];
   $data = "select * from OrderInfo where orderId='$id'";
   $result =  mysqli_query($con, $data);
   $stripe = new \Stripe\StripeClient(
    );
    // Get Product information from Stripe
    $picked_price=$stripe->prices->retrieve(
      $id,
      []
    );
    $productId = $picked_price['product'];
    $picked_product=$stripe->products->retrieve(
      $productId,
      []
    );
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://js.stripe.com/v3/"></script>
      <link rel="stylesheet" href = "mainPaymentPage.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Pay Page</title>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">
            <img src="./rsc/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a>
            <div class="form-inline">
               <a class="nav-link" href="#">Home</a>
               <a class="nav-link" href="#">Pricing</a>
               <a class="nav-link" href="#">Blog</a>
            </div>
         </nav>
      </header>
      <div class="container">
         <div class="grid1">
            <p id="sNO1">1</p>
            <p id="yourCartHead">Your Cart</p>
            <hr id="yourCardtHR">
            <span style="font-size:20px" class="glyphicon glyphicon-ok"></span>
         </div>
         <?php
            while($row=mysqli_fetch_assoc($result))
            {
            $price = intval($picked_price['unit_amount_decimal'])/100;
			   $tax = $price*0.15;
			   $total = $price + $tax;
            echo '<div class="mainYourCartDiv">

            <div class="yourCartContent">

               <div class="totalAmount">
                   <p class="totalAmountLHS">Your Plan</p>
                   <p class="totalAmountRHS">'.$picked_product['name'].'</p>

                   <p class="totalAmountLHS">Pricing</p>
                   <p class="totalAmountRHS">'.$price.' CAD</p>

                   <p class="totalAmountLHS">Taxes</p>
                   <p class="totalAmountRHS">'.$tax.' CAD</p>

                   <hr id="totalAmountHR">

                   <p class="totalAmountLHS">Total</p>
                   <p class="totalAmountRHS">'.$total.' CAD</p>
               </div>


               <div class="planCard">

                   <div class="cardTemplate">

                       <p>'.$picked_product['name'].'</p>
                       <p id="cardPrice">'.$price.' CAD</p>

                   </div>
               </div>


            </div>

            </div>

         <div class="grid2">
         <p id="sNO1">2</p>
         <p id="yourCartHead">Card Details</p>
         <hr id="yourCardtHR">
         <span style="font-size:20px" class="glyphicon glyphicon-ok"></span>
      </div>
      <div class="credit-details-form">
         <form action="./charge.php?id='.$picked_price['id'].'" method="post" id="payment-form">
            <div class="form-row">
               <label for="full_name">Cardholder\' name</label>
               <input type="text" name="full_name" class="form-control mb-3 StripeElement StripeElement--empty"
                  placeholder="Full Name">
               <label for="email">Email Address</label><br>
               <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty"
                  placeholder="Email Address">
               <div id="card-element" class="form-control">
                  <!-- a Stripe Element will be inserted here. -->
               </div>
               <!-- Used to display form errors -->
               <div id="card-errors" role="alert"></div>
               <break/>
               <label style="margin-top:20px" for="promo">Promotion Code</label><br>
               <input style="margin-bottom:10px" type="text" name="promo" id="promo" placeholder="Promotion Code">
               <br/>
               <break/>
               <input type="checkbox" name="confirm" id="confirm"> <label for="confirm">I confirm that the above information is correct</label><br>
               <p style="margin-bottom:20px">By clicking the button, you agree to the <a><span style="text-color:blue">Terms and Conditions</a></span></p>
            </div>
            <button id="proceed">Place Order</button>
            <a href="index.php"><button style="background-color:#dddddf" type="button" id="return">Return to Pricing Page</button></a>
            <br>
         </form>
      </div>
            ';
            }
            ?>

         <hr>

      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="rsc/js/charge.js"></script>
      <footer>
         <div class="footerContent">
            <ul id="footerList">
               <li><a href="#">About Us</a></li>
               <li><a href="#">FAQ</a></li>
               <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p>&copy; 2021 MatchProfessor Inc. </p>
         </div>
      </footer>
   </body>
</html>
