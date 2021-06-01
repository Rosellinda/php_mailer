<?php
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");

    if(isset($_POST['send'])){


    $mailto = $_POST['email'];
    $body = $_POST['body'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3; //ilalabas lahat ng mga logs

    $mail->isSMTP();

    $mail->Host = "mail.smtp2go.com";

    $mail->SMTPAuth = true;

    $mail->Username = "pinoyfreecoder";
    $mail->Password = "test123456";

    $mail->SMTPSecure = "tls";

    $mail->Port = "2525";

    $mail->From = "admin@pinoyfreecoder.com";
    $mail->FromName = "PinoyFreeCoder";

    $mail->addAddress($mailto, "Roselle");

    $mail->isHTML(true);
    $mail->Subject = "Test Email Notification";
    $mail->Body = $body;
    $mail->AltBody = "This is plain text version of the email content";

    if(!$mail->send()){
        echo "Mailer error :".$mail->ErrorInfo;
    }else{
        echo "Message has been sent";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mailer</title>
</head>
<body>
    <form action="#" method="post">
        <label>Email to :</label>
        <input type="email" name="email" id="email">

        <label>Body</label>
        <textarea name="body" cols="30" rows="10"></textarea>

        <button type="submit" name="send">Send Email</button>
    </form>
</body>
</html>