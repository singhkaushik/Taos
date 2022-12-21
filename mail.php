<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = stripslashes($_POST['name']);
    $email = $_POST['email'];
    $message = htmlentities($_POST['message']);

    $sender_host = "mail.taos.org.in";

    $sender = "TAOS";
    $sender_email = "support@taos.org.in";
    $passwd = '3P~aw9x90';

    $receiver_email = "singhkaushik28@gmail.com";

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer(true);

    //server settings
    $mail->isSMTP();
    $mail->Host = $sender_host;
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $passwd;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // debug
    $mail->SMTPDebug = 2;

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($sender_email, $sender);
    $mail->addAddress($receiver_email);
    $mail->Subject = ("Contact | $name");
    $mail->Body = "Name:$name <br>Email: $email <br>Message: $message";

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("error" => $status, "response" => $response)));
    
}
