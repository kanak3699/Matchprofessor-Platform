<?php
  require_once('vendor/autoload.php');
  include 'rsc/config/connection.php';

  \Stripe\Stripe::setApiKey('sk_test_51IEehsLG85xJeAiZFLGRHD2PDEfB0f3Z9tYfWBgqU8wvyCD6BCpxtAG3168X9kAmoMLPpqGIqCBn0sDUoJADnUXn00khwHd7lG');
  $stripe = new \Stripe\StripeClient(
     'sk_test_51IEehsLG85xJeAiZFLGRHD2PDEfB0f3Z9tYfWBgqU8wvyCD6BCpxtAG3168X9kAmoMLPpqGIqCBn0sDUoJADnUXn00khwHd7lG'
   );
 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
 $id = $_GET['id'];

 // Get Product Information from Stripe
 $picked_price=$stripe->prices->retrieve(
   $id,
   []
 );
 $productId = $picked_price['product'];

 $picked_product=$stripe->products->retrieve(
   $productId,
   []
 );
 $product_name = $picked_product['name'];
 
 $product_price = intval($picked_price['unit_amount_decimal'])/100;

 // Get POST user information

 $full_name = $POST['full_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];


 //Send order data to database
 $sql = "INSERT INTO UserInfo (userName,cardNum,email,premium) VALUES ('$full_name','$token','$email','$product_name')";
 $storeInfo = mysqli_query($con,$sql);

 
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

$charge = \Stripe\Charge::create(array(
  "amount" => $product_price,                        
  "currency" => "cad",
  "description" => $product_name,
  "customer" => $customer->id
));




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
    <link rel="stylesheet" href="rsc/styles/styles.css">
    <link rel="stylesheet" href="pricingPageStyle.css" type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
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
	    <div class="row text-center">
        <div class="col-lg" style="height: 600px">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <img src="http://osmhotels.com//assets/check-true.jpg">
        <h2> Thank you for purchasing <?php echo $charge['description']; ?> </h2>
        <p> Your Transaction ID is <?php echo $charge['id']; ?>  </p>
        <p> Check your email for more information</p>
        <a href="index.php" class="btn btn-light mt-2"> Go Back </a>
    <br><br>
        </div>

	</div>
</div>
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
