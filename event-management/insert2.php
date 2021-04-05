<?php

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$mailid=$_POST["mailid"];
$country=$_POST["country"];
$subject=$_POST["subject"];

$host="localhost";
$dbUsername ="root";
$dbPassword="";
$dbname="events";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if($conn->connect_error){
die('Connect Failed : ' .$conn->connect_error);
}
else{
$stmt =$conn->prepare("INSERT Into feedback(firstname,lastname,mailid,country,subject) values(?,?,?,?,?)");
$stmt->bind_param("sssss",$firstname,$lastname,$mailid,$country,$subject);

$stmt->execute();
echo "New record inserted successfully";

header('location:event.html');

$stmt->close();
$conn->close();
}


?>
