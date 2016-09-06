<?php
$errorMSG = "";

$to = "stefan@moshpit.ru";


if(isset($_POST['name'])) {
    $name = $_POST['name'];
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
}
if(isset($_POST['message'])){
    $message = $_POST['message'];
}

$subject = 'New message from Trytics';
        $message = '
                <html>
                    <body>
                        <p>Имя: '.$name.'  </p>
                        <p>Email: '.$email.' </p>
                        <p>Сообщение: '.$message.' </p>
                    </body>
                </html>';
$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: no-reply@trytics.io"."\r\n" . "Reply-To: no-reply@trytics.io"."\r\n";
$success = mail($to, $subject, $message, $headers);

if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>