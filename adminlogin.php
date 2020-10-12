<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $id=validate($_POST['userid']);
  $pass=validate($_POST['password']);
}


function validate($value){
  $data=trim($value);
  $data=stripslashes($value);
  $data=htmlspecialchars($value);
  return $data;
}

if($id=="admin" && $pass=="admin123") {
     header("Location:bill.php");
       //echo "Success";
    }
    else{
      echo "Email or Password is incorrect";

    }
?>
