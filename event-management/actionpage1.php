<?php

$email=$_POST["email"];
$psw=$_POST["psw"];
$pswrepeat=$_POST["pswrepeat"];

$host="localhost";
$dbUsername ="root";
$dbPassword="";
$dbname="events";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if($conn->connect_error){
die('Connect Failed : ' .$conn->connect_error);
}
else{
$stmt =$conn->prepare("INSERT Into signup(email,psw,pswrepeat) values(?,?,?)");
$stmt->bind_param("sss",$email,$psw,$pswrepeat);

$stmt->execute();
echo "New record inserted successfully";
header('location:login.html');



$stmt->close();
$conn->close();
}


?>
