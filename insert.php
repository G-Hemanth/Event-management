<?php
$name=$_POST["name"];
$email=$_POST["email"];
$ct=$_POST["ct"];
$en=$_POST["en"];
$date=$_POST["date"];
$nop=$_POST["nop"];
$location=$_POST["location"];
$address=$_POST["address"];
$ec=$_POST["ec"];


$host="localhost";
$dbUsername ="root";
$dbPassword="";
$dbname="events";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if($conn->connect_error){
die('Connect Failed : ' .$conn->connect_error);
}
else{
$stmt =$conn->prepare("INSERT Into registration(name,email,ct,en,nop,date,location,address,ec) values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssisisssi",$name,$email,$ct,$en,$nop,$date,$location,$address,$ec);

$stmt->execute();
echo "New record inserted successfully";
header('location:event.html');



$stmt->close();
$conn->close();
}


?>
