<html>
<head>
	<meta charset="utf-8">
<title>Blog-td</title>
<link href="Blog-td.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="about-us.css">

	<div><nav id="nav-bar">
  <div id="navigation">
  <ul>
  <li><a href="F:\Blog-intern\Blog-td.html" style="color: white;">Home</a></li>
  <li><a href="blog-about us page.html" style="color: white;">About</a></li>
    <li><a href="insert-link.html" style="color: white;">Contact</a></li>
    <li>
    <select name="list" id="list" accesskey="target">
    <option value='none' selected>Choose your page</option>
    <option value="theme1.html">Post Your Opinion</option>
    <option value="xyz.html">Technology</option>
    <option value="theme3.html">News</option>
    <option value="theme4.html">Sports</option>
    <option value="F:\Blog-intern\blog-about us page.html">About Us</option>
<select>
<input type=button value="Go" onclick="goToNewPage()" />
    </li>
    <div id="search"><input id="search" type="text" placeholder="Search" /></div>
</ul>
</div>
</nav>
</div>

<style>
body{
 background-image:url("background1.jpg");
}
table{
 width: 1000px;
 background: aqua;
 border:inset black 3px;
 margin-left: 200px;
 margin-top: 20px;
 padding: 2em;
}
td,th{
 border: inset black 1px;
padding: 1em;
font-weight: bold;
}
.style1{
 margin-left: 400px;
 margin-top: 180px;
}
</style>
<div align="right"><a href="login.html">Logout</a></div>
</head>
<body>
  <div class="style1">
    <a href ='form.html' > Add New item</a>
  </div>


</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','billing_system');
if($con==false)
{
 die('problem in connection');
}

$name=$_POST['un'];
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
