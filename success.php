<?php
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <div class = "container mt-4">
    <h2> Thank you for purchasing <?php echo $product; ?> </h2>
    <hr>
    <p> Your Transaction ID is <?php echo $tid; ?>  </p>
    <p> Check yuor email for more information</p>
    <p> <a href="index.php" class="btn btn-light mt-2"> Go Back </a>
    </p>
    <div class="container">
	    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <img src="http://osmhotels.com//assets/check-true.jpg">
        <h3>Dear, Faisal khan</h3>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for verifying your Mobile No.We have sent you an email "faisalkhan.chat@gmail.com" with your details
Please go to your above email now and login.</p>
        <a href="" class="btn btn-success">     Log in      </a>
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