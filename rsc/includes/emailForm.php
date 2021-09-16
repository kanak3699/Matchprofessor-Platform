<?php
    // The code below sanitizes the form data submitted by the customer and sends a generated email to the listed email address below.
    // DATA SANATIZATION PROCESS
    $name = trim($_POST['customer-name']);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['customer-email']);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    $subject = trim($_POST['customer-subject']);
    $subject = stripslashes($subject);
    $subject = htmlspecialchars($subject);

    $message = trim($_POST['customer-message']);
    $message = stripslashes($message);
    $message = htmlspecialchars($message);

    $clientEmail = "ad496472@dal.ca"; //used temp email for testing

    $subject = "MatchProfessor Customer Enquiry: ".$subject;

    $message = "From: ".$name."\n".$message;

    mail($clientEmail,$subject,$message);

    header("Location: ../../index.php"); // redirect back to index page after email submission

?>