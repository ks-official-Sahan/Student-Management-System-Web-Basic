<?php

session_start();

require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$nic = $_POST["nic"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$password = $_POST["password"];
$image = "";

if (isset($_FILES["image"])) {
    $image = $_FILES["image"]["name"];
} else {

    $image = "contact.png";
}


// echo $fname." ".$lname." ".$dob." ".$gender." ".$nic." ".$mobile." ".$address." ".$email." ".$uname." ".$password." ".$image." ".$grade." ".$subject;


if (empty($fname)) {
    echo "Please enter the first name";
} else if (empty($lname)) {
    echo "Please enter the last name";
} else if (empty($dob)) {
    echo "Please enter the date of birth";
} else if ($gender == 0) {
    echo "Please select the gender";
} else if (empty($nic)) {
    echo "Please enter the NIC";
} else if (empty($mobile)) {
    echo "Please enter the mobile";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
    echo "Invalid mobile";
} else if (strlen($mobile) != "10") {
    echo "Mobile number should have only 10 numbers";
} else if (empty($address)) {
    echo "Please enter the address";
} else if (empty($email)) {
    echo "Please enter the email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
}  else if (empty($uname)) {
    echo "Please enter the user name";
} else if (empty($password)) {
    echo "Please enter the password";
} else if (strlen($password) < 5 || strlen($password) > 16) {
    echo "Password shold be among 5 and 16 characters";
} else {

    $vc = uniqid();
    $fileName = "";



    if (isset($_FILES["image"])) {
        $fileName = "profile_img//" . uniqid() . $image;

        move_uploaded_file($_FILES["image"]["tmp_name"], $fileName);
    } else {
        $fileName = "Images//contact.png";
    }



    Database::iud("INSERT INTO `teachers` (`fname`,`lname`,`dob`,`gender_id`,`nic`,`mobile`,`address`,`email`,`user_name`,`password`,`status_id`,`verification_code`,`image`) 
    VALUES('" . $fname . "','" . $lname . "','" . $dob . "','" . $gender . "','" . $nic . "','" . $mobile . "','" . $address . "','" . $email . "','" . $uname . "','" . $password . "','2','" . $vc . "','" . $fileName . "');");

    $last_id = Database::$connection->insert_id;

    

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bgcjayanath2000@gmail.com';
    $mail->Password = 'CjcJ2@@@/5/!2';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('bgcjayanath2000@gmail.com', 'CJ Accademy');
    $mail->addReplyTo('bgcjayanath2000@gmail.com', 'CJ Accademy');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Login Details';
    $bodyContent = '<h1>CJ Accademy</h1>';
    $bodyContent .= '<p>Use these login details as a teacher. You can change these User name and password after login</p>
    <br/><br/>
    <P>User Name :'.$uname.'</P>
    <P>Password :'.$password.'</P>
    <P>Verification Code :'.$vc.'</P>';

    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
    }

    echo "success";

}
