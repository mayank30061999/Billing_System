<?php

include "Classes/Conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $Name=Validate($_POST['name']);
  $Address=Validate($_POST['address']);
  $Password=Validate($_POST['pass']);
}

function Validate($value)
{
 $data=trim($value);
 $data=stripslashes($value);
 $data=htmlspecialchars($value);
 return $data;
}

$conn;
$database=DBConfig::DATABASE;
$connection=new Conn();
$conn=$connection->connectDB($database);


$sql="Insert into users(Name,Password,Address) values('$Name','$Password','$Address')";

if($conn->query($sql)===true){
header("Location:afterusersignup.php?name=".$Name."&addr=".$Address."");
}
else{
echo "Error";
}
 ?>
