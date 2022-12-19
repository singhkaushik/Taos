<?php


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $from_name = stripslashes($_POST['name']);
    $from_email = $_POST['email'];
    $from_message = htmlentities($_POST['message']);
    
    $to_email = "thearsrock1234@gmail.com";
    
    $subject = "Contact | ".$from_name;
    
    $message = "Email:".$from_email. "\n\nMessage:" .$from_message;
    $headers = "From: {$from_name} <{$from_email}>";

    ini_set( 'display_errors', 1);
    error_reporting ( E_ALL );
    
    // mail($to_email, $subject, $message, $headers);
    // return;


    if (mail($to_email, $subject, $message, $headers)) {
        echo "success";
        // header('Location: index.html');
        // return;
    } else {
        die("Some Error!");
    }
    
    
} else {
    die("No data!");
}

?>

