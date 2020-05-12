<?php  

$name = $_POST["username"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$msg = "Name: " . $name . "/n" . "Email Id : " . $email . "/n" . "Message : " . $message ;

mail("iyengarnitya@gmail.com", $subject , $msg);
header("Location:index.php");

?>