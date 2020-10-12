<html>
<head>
<style>
body{
  background-image:url("background1.jpg");
}
table{
  background: aqua;
  border:inset black 10px;
  margin-left: 400px;
  margin-top: 200px;
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
</head>
<body>
  <div class="style1">
    <strong>Remember the User ID</strong>
    <br><br>
    <a href ='login.html' >Proceed to Login</a>;


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
$addr=$_GET['addr'];
$query="select * from users where Name='".$name."' and Address='".$addr."'";

$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
echo "<table>";
echo "<tr>";
echo "<th>Users Id </th>";
echo "<th>Users Name </th> ";
echo "<th>Users Address</th>";
echo "</tr>";

while ($row) {
  echo "<tr><td>".$row[0]."</td><td> ".$row[1]."</td><td> ".$row[3]."</td></tr>";
  $row=mysqli_fetch_row($result);
}
echo "</table>";
 ?>
