<?php

$email=$_POST["email"];
$psw=$_POST["psw"];


$host="localhost";
$dbUsername ="root";
$dbPassword="";
$dbname="events";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if($conn->connect_error){
die('Connect Failed : ' .$conn->connect_error);
}
else{
$stmt =$conn->prepare("INSERT Into login(email,psw) values(?,?)");
$stmt->bind_param("ss",$email,$psw);

$stmt->execute();
echo "New record inserted successfully";

header('location:event.html');

$stmt->close();
$conn->close();
}


?>
