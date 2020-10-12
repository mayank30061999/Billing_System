<?php
include "Classes/Conn.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $id=validate($_POST['userid']);
  $pass=validate($_POST['password']);
  $name=validate($_POST['name']);
}


function validate($value){
  $data=trim($value);
  $data=stripslashes($value);
  $data=htmlspecialchars($value);
  return $data;
}

$conn;
$database=DBConfig::DATABASE;
$connection=new Conn();
$conn=$connection->connectDB($database);


if(count($_POST)>0) {
	//$conn = mysqli_connect("localhost","root","","phppot_examples");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE ID='" . $id . "' and Password = '". $pass ."'");
	$count  = mysqli_num_rows($result);

	if($count>0) {
       header("Location:userbill.php?name=".$name."");
       //echo "Success";
    }
    else{
      echo "Email or Password is incorrect";

    }
}
