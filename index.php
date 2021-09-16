<?php
    require_once('./vendor/autoload.php');
    require_once('./api/StripeAPI.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
    <link rel="stylesheet" href="rsc/styles/styles.css">
    <link rel="stylesheet" href="pricingPageStyle.css" type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div style="background-color: #ffeb9c" class="jumbotron">
  <div  class="container text-center">
    <h1>Improve your GPA Score, Guaranteed!</h1>      
    <p>Features</p>

    <div class="container-fluid">
        <div class="row">
            <?php
                for($i=0;$i<count($features);$i++){
                    echo "
                        <div class='col-sm-4'>
                        <div class='panel panel-default'>
                        <div style='background-color:#E3E3E3' class='panel-heading'>".$features[$i][0]."</div>
                        <div class='panel-body'>".$features[$i][1]."</div>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
  </div>
</div>
    <div class="container">
    <!-- <h1 id="mainTitle">Choose Your Plan</h1> -->
    <div class="pricing-cards">
        <ul>
    <?php
 

        echo '<li id="plan1" class="planCard">
        <div id="planA">
            <h3 style="font-size:28px" id="insideCardHeading">'.$product_1['name'].'</h3>
            <div class="insideCardInfo">				<!--  main content inside the card -->
                <div id="insideCardPriceHeading">
                <h3 style="font-weight:bold">$'.$price1.'<small style="font-weight:bold">CAD</small></h3>
                <h4 style="color:gray">'.$product_1['description'].'</h4>
                </div>
               


                <div id="insideCardPara">
                <div style="margin-bottom:10px, margin-top:10px, font-weight:bold">
                    <h4><b>Content</b></h4>
                </div>
    
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> Comprehensive coverage</b> of Management, Computer Science, etc...</span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"> Helpful <b>video lessons & tutorials</b></span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"> Select from <b>a large pool of Professor & Doctors</b></span><br/>
                </div>
                <hr/>
                <div id="insideCardPara">
                <div style="margin-bottom:10px, margin-top:10px, font-weight:bold">
                <h4><b>Features</b></h4>
            </div>
                <span style="font-size:20px" class="glyphicon glyphicon-ok"> <b>'.$product_1['name'].'</b></span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> Ask an expert</b> of Management, Computer Science, etc...</span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> GPA improvement guarantee</b> of Management, Computer Science, etc...</span><br/>
                </div>
                <hr>
                <div class="insideCardContent">
            <form id="go_to_payment_form" action="payment.php?id='.$plan1['id'].'" method="POST">
                <input class="button button1" type="submit" value="Sign Up Here">
            </form>
        <div>

            </div>
        </di>

        </li>

        ';
        echo '<li id="plan2" class="planCard">
        <div id="planA">
            <h3 style="font-size:28px" id="insideCardHeading">'.$product_2['name'].'</h3>
            <div class="insideCardInfo">				<!--  main content inside the card -->
                <div id="insideCardPriceHeading">
                <h3 style="font-weight:bold">$'.$price2.'<small style="font-weight:bold">CAD</small></h3>
                <h4 style="color:gray">'.$product_2['description'].'</h4>
                </div>
               


                <div id="insideCardPara">
                <div style="margin-bottom:10px, margin-top:10px, font-weight:bold">
                    <h4><b>Content</b></h4>
                </div>
    
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> Comprehensive coverage</b> of Management, Computer Science, etc...</span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"> Helpful <b>video lessons & tutorials</b></span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"> Select from <b>a large pool of Professor & Doctors</b></span><br/>

                </div>
                <hr/>
                <div id="insideCardPara">
                <div style="margin-bottom:10px, margin-top:10px, font-weight:bold">
                <h4><b>Features</b></h4>
            </div>
                <span style="font-size:20px" class="glyphicon glyphicon-ok"> <b>'.$product_2['name'].'</b></span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> Ask an expert</b> of Management, Computer Science, etc...</span><br/>
                    <span style="font-size:20px" class="glyphicon glyphicon-ok"><b> GPA improvement guarantee</b> of Management, Computer Science, etc...</span><br/>
                </div>
                <hr>
                <div class="insideCardContent">
            <form id="go_to_payment_form" action="payment.php?id='.$plan2['id'].'" method="POST">
                <input class="button button1" type="submit" value="Sign Up Here">
            </form>
        <div>

            </div>
        </di>

        </li>

        ';
    ?>
    </ul>
    </div>
   		
    </div>

    <div class="pricing-tabs">
        <div class="container">
            <div class="row">


                <div class="col-lg-5 col-md-6 center-block">

                    <div class="tab-container">
                        <div class="individualPricing">
                            <div class="head-text">
                                <h3>HEADING 1</h3>

                            </div>
                            <div class="priceArea">
                                <p>$419.99</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <div class="features">

                                <hr>

                                <h4 style="text-align: left; font-size: 20px; font-weight: 700;" >Content</h4>
                                <ul>
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 1</li>

                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 2</li>
                                    
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 3</li>
                                </ul>

                                <hr>

                                <h4 style="text-align: left; font-size: 20px; font-weight: 700;" >Features</h4>
                                <ul>
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 1</li>

                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 2</li>
                                    
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 3</li>

                                </ul>

                            </div>
                            <div class="cardButton">
                                <form id="go_to_payment_form" action="payment.php" method="POST">
                                    <input class="button button1" type="submit" value="Sign Up Here">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>  


                <div class="col-lg-5 col-md-6 center-block">

                    <div class="tab-container">
                        <div class="individualPricing">
                            <div class="head-text">
                                <h3>HEADING 2</h3>

                            </div>
                            <div class="priceArea">
                                <p>$399.99</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <div class="features">

                                <hr>

                                <h4 style="text-align: left; font-size: 20px; font-weight: 700;" >Content</h4>

                                <ul>
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 1</li>

                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 2</li>
                                    
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 3</li>
                                    
                                </ul>
                                    

                                <hr>

                                <h4 style="text-align: left; font-size: 20px; font-weight: 700;" >Features</h4>
                                <ul>
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 1</li>

                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 2</li>
                                    
                                    <li><span style="font-size:17px" class="glyphicon glyphicon-ok"></span> &emsp; Feature 3</li>
                                    
                                </ul>

                            </div>
                            <div class="cardButton">
                                <form id="go_to_payment_form" action="payment.php" method="POST">
                                    <input class="button button1" type="submit" value="Sign Up Here">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

   

    <div class="wrapper p-4"  style=" background: #707070">


            <div class="container">
            <section id="productInfo">

                    <div class="productImage">

                        <img id="image" width="360" height="300" src="https://images.unsplash.com/photo-1593642634367-d91a135587b5?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=3150&q=80" id="dummyImage">
                        
                    </div>

                    <div id="productUnit">

                        <h1 id="planNameHeading">Plan B</h1>
                        <h3 id="planPriceHeading">$499.99</h3>
                        <p id="productPara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ut aperiam fugiat, maxime, 
                        tenetur numquam vitae, veniam quasi voluptatem distinctio sed! Laborum ex beatae veniam nostrum i
                        nventore voluptatem atque tenetur.Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ut aperiam fugiat, maxime, 
                        tenetur numquam vitae, veniam quasi voluptatem distinctio sed! Laborum ex beatae veniam nostrum i
                        nventore voluptatem atque tenetur.</p>
                        <a href="index.php" class="btn btn-success mt-2"> Checkout </a>
                
                    </div>
                    
                </section>

                
            </div>
         
            <div class="container">
            
            <table style="height:400px" class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th id="header-feature">How does MatchProfessor compare?</th>
                        <th id="header-company">Match Professor</th>
                        <th id="header-company">Group classes</th>
                        <th id="header-company">Private tutors</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    //Looping through data set in config.php
                        for($i=0;$i<count($competitive_table);$i++){
                            echo "
                            <tr >
                                <td id='row-features'>".$competitive_table[$i][0]."</td>
                                <td id='row-products'>".$competitive_table[$i][1]."</span></td>
                                <td id='row-products'>".$competitive_table[$i][2]."</span></td>
                                <td id='row-products'>".$competitive_table[$i][3]."</td>
                            </tr>";
                        }
                    ?>          
                </tbody>
            </table>

            </div>
    </div>

        <section class="testimonials">

<div class="container">

    <h1 class="text-center">TESTIMONIALS</h1>
    <p class="text-center">What our customers have to say about us</p>

    <div class="row">
    <?php
        for($i=0;$i<count($testimonials);$i++){
            echo "
            <div class='col-md-4 text-center'>
                <div class='profile'>
                    <img src='https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260' class='dummyUserImage' height='300px' width='250px'>
                    <blockquote>
                        ".$testimonials[$i][0]."
                    </blockquote>
                    <h2>".$testimonials[$i][1]." ".$testimonials[$i][2]."<span> ".$testimonials[$i][3]."</span></h2>
                </div>
            </div>";
        }
    ?>
    </div>

    
</div>


</section>
<div class="wrapper p-3" style="background: white">

<div class="container-fluid text-center">
<h3 style="margin:20px">Frequently asked questions</h3>      
        <div class="row">
            <?php
                for($i=0;$i<count($frequently_asked_questions);$i++){
                    echo "
                        <div class='col-sm-4'>
                        <div class='panel panel-default'>
                        <div style='background-color:#E3E3E3' class='panel-heading'>".$frequently_asked_questions[$i][0]."</div>
                        <div class='panel-body'>".$frequently_asked_questions[$i][1]."</div>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>

</div>

<div id="supportBanner-main">
        <section style="border:none" id="supportContents">

            <div style="margin-right: 10px" id="supportLogo">
                <img  src="rsc/images/customer-support.png" style=" width: 125px; height: 125px" alt="support-logo">
            </div>

            <section style="border:none" id="supportDescription">
                <h4 class="supportDescription-h"><strong>Got a question?</strong></h4>
                <p class="supportDescription-p">Talk to us, our support team is available 24/7!</p>
                <p class="supportDescription-p">Click the button below and tell us about your inquiry. We value your customer experience!</p>
                <!-- click to show/hide enquiry form-->
                <button type="button" id="contactUs-button" class="btn btn-primary" onclick="openEmailForm()">Contact Us</button>
            </section>

        </section>

        <div id="supportForm">
            <hr id="separator">
            <form method="post" action="rsc/includes/emailForm.php">
                <div class="form-group">
                    <label class="formLabel" for="customerName">Your Name</label>
                    <input class="form-control" name="customer-name" type="text" id="customerName" placeholder="Please enter your name here">
                </div>
                <div class="form-group">
                    <label class="formLabel" for="customerEmail">Your Email</label>
                    <input class="form-control" name="customer-email" type="text" id="customerEmail" placeholder="Please enter your email address here">
                </div>
                <div class="form-group">
                    <label class="formLabel" for="customerSubject">Subject</label>
                    <input class="form-control" name="customer-subject" type="text" id="customerSubject" placeholder="Please enter a relevant subject for your message">
                </div>
                <div class="form-group">
                    <label class="formLabel" for="customerMessage">How can we help you?</label>
                    <textarea class="form-control" id="customerMessage" name="customer-message" placeholder="Please type your concerns here"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" id="submitForm" value="Submit">
                <button type="button" class="btn btn-danger" onclick="closeEmailForm()">Cancel</button>
            </form>
        </div>
    </div>


    
    <footer>

<div class="footerContent" style="background: #D2D2D2">
    <ul id="footerList">
        <li><a href="#">About Us</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Privacy Policy</a></li>
    </ul>
    <p>&copy; 2021 MatchProfessor Inc. </p>
</div>
</footer>
<script src="rsc/js/function.js">
</script>
</body>
</html>
