<?php

$name=$_POST['name'];
$email=$_POST['email'];
$mes=$_POST['OTP'];
$conn = mysqli_connect("localhost", "root", "", "test");
$query= mysqli_query($conn, "SELECT * FROM `student` WHERE email='$email'");
if(mysqli_num_rows($query)>0){
    $data=1;
    echo json_encode($data);
}else{
$sql= "INSERT INTO `student`(`name`, `email`) VALUES ('$name', '$email')";
$ad= mysqli_query($conn, $sql);
$data=0;

$sub="OTP verification";
$message= "To verify your email please enter $mes";
$from="YOUR_MAIL_ID@GMAIL.COM";
$HEAD="FROM : $from";
mail($email, $sub, $message, $HEAD);

echo json_encode($data);
 }
?>