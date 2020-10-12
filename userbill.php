<html>
<head>
<style>
body{
 background-image:url("background1.jpg");
}
table{
 width: 1000px;
 background: aqua;
 border:inset black 10px;
 margin-left: 40px;
 margin-top: 20px;
 padding: 2em;

}
td,th{
 border: inset black 1px;
padding: 1em;
font-weight: bold;
}
.style1{
 margin-left: 200px;
 margin-top: 100px;
}
</style>
<div align="right"><a href="login.html">Logout</a></div>
</head>
<body>



</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','billing_system');
if($con==false)
{
 die('problem in connection');
}
$name=$_GET['name'];
//$pass=$_GET['pass'];
$query="select * from product where username='".$name."'";

$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);

echo "<table>";
echo"<th>Bill for User:".$name."</th>";
echo "<tr>";
echo "<th>Username </th>";
echo "<th>Product name </th> ";
echo "<th>Product Details </th>";
echo "<th>Price </th>";
echo "<th>Quantity </th>";
echo "<th>Time</th>";
echo "<th>Amount</th>";
echo "</tr>";
$total=0;
while ($row) {
  $total=($row[4]*$row[5])+$total;
 echo "<tr><td>".$row[1]."</td><td> ".$row[2]."</td><td> ".$row[3]."</td><td> ".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".($row[4]*$row[5])."</td></tr>";
 $row=mysqli_fetch_row($result);
}
echo "<tr><th></th><th></th><th></th><th></th><th></th><th>Total=</th><td>".($total)."</td></tr>";
echo "</table>";
?>
