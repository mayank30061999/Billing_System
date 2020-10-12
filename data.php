<?php
$con=mysqli_connect('localhost','root','','billing_system');
 if($con==false)
	    die('problem in connection');

$operation=$_POST['button'];

if($operation=="Add Product"){
$username=$_POST['username'];
$name=$_POST['name'];
$detail=$_POST['details'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];

mysqli_query($con,"INSERT INTO `product`(`username`, `name`, `details`, `price`, `quantity`) VALUES ('$username','$name','$detail','$price','$quantity')")
or die('can not insert record  error code').mysqli_errno($con)." <br> Error ".mysqli_error($con);
echo '<center><h2>'.mysqli_affected_rows($con).'</h2> records added';
include "bill.php";
 }

else if($operation=="Search Product"){

$name=$_POST['name'];
$query="select * from product where name='".$name."'";
$result= mysqli_query($con,$query);
$n=mysqli_num_rows($result);
if($n>0)
{

	$row=mysqli_fetch_row($result);

	echo "<table>";
	echo "<tr>" ;
	echo "<th>Username</th>";
	echo "<th>Name</th>";
	echo "<th>Details</th>";
  echo "<th>Price</th>";
  echo "<th>Quantity</th>";

	echo "</tr>";
		  echo "<tr><td>".$row[1]."</td><td>  ".$row[2]."</td><td>  ".$row[3]."</td><td>  ".$row[4]."</td><td>  ".$row[5]."</td></tr>";
	echo "</table>";
    }
    else
      echo "<h1>No Record Found for Name ".$name." </h1>";
	}

else if($operation=="ShowAll Product"){
									  include "bill.php";
									  }
else if($operation=="Remove Product"){

$name=$_POST['name'];
$query="select * from product where name='".$name."'";
$result= mysqli_query($con,$query);
$n=mysqli_num_rows($result);
if($n>0)
{$q="DELETE FROM `product` WHERE name='".$name."'";
	mysqli_query($con,$q);
	echo '<center><h2>'.mysqli_affected_rows($con).'  Record Deleted </h2></center> ';

}
else{
echo '<center><h2>No Record Present For the name   '.$name.'</h2></center>';

}
}
else if($operation=="Update Product"){
	 $name=$_POST['name'];
   $query="select * from product where name='".$name."'";
   $result= mysqli_query($con,$query);

$n=mysqli_num_rows($result);
if($n>0)
  {
    $username=$_POST['username'];
    $detail=$_POST['details'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    mysqli_query($con,"update  product set username='".$username."',details='".$detail."',quantity=".$quantity.", price=".$price." where name='".$name."'");
	echo '<center><h2>'.mysqli_affected_rows($con).'  Record Updated </h2></center> ';
  include "bill.php";

  }
  else {
	echo '<center><h2>No Record Present For the name   '.$name.'</h2></center>';
	echo '<center><h2>It cannot be updated</h2></center>';

	}
}
?>
