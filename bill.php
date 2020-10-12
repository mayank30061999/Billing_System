 <html>
<head>
  <meta charset="utf-8">
  <link href="Blog-td.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="about-us.css">
<script type="text/javascript">
    function goToNewPage()
    {
        var url = document.getElementById('list').value;
        if(url != 'none') {
            window.location = url;
        }
    }
</script>

</script>
  <div><nav id="nav-bar">
  <div id="navigation">
  <ul>
  <li><a href="" style="color: white;">Home</a></li>
  <li><a href="about-us-page.html" style="color: white;">About</a></li>
    <li><a href="insert-link.html" style="color: white;">Contact</a></li>
    <li>
    <select name="list" id="list" accesskey="target">
    <option value='none' selected>Choose your page</option>
    <option value="#1.html">Link1</option>
    <option value="#2.html">Link2</option>
    <option value="#3.html">Link3</option>
    <option value="#4.html">Link4</option>
    <option value="about-us-page.html">About Us</option>
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
  background-image:url("download.jpg");
}
table{
  width: 1000px;
  color: black;
  border:inset black 10px;
  margin-left: 40px;
  margin-top: 20px;
  padding: 2em;

}
h2{
  color: white;
}
td,th{
  border: inset black 1px;
padding: 1em;
font-weight: bold;
}
.style1{
  margin-left: 200px;
  margin-top: 100px;
  padding-top: 50px;
}
</style>
<div align="right"><a href="adminlogin.html" style="color: white;">Logout</a></div>
</head>
<body>
  <div class="style1">
    <a href ='form.html'> Add New item</a>
</div>
<div align="center"><b><h3 style="color: black;">Bill for specific User:</h3></b>
  <form method="POST" action="userbill1.php">
  <input type="text" name="un"   >
</div>
</body>
<span>
<?php
$con=mysqli_connect('localhost','root','','billing_system');
if($con==false)
{
  die('problem in connection');
}

$result=mysqli_query($con,'select * from product');
$row=mysqli_fetch_row($result);
echo "<table>";
echo "<tr>";
echo "<th>Username </th>";
echo "<th>Product name </th> ";
echo "<th>Product Details </th>";
echo "<th>Price </th>";
echo "<th>Quantity </th>";
echo "<th>Time</th>";
echo "</tr>";

while ($row) {
  echo "<tr><td>".$row[1]."</td><td> ".$row[2]."</td><td> ".$row[3]."</td><td> ".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>";
  $row=mysqli_fetch_row($result);
}
echo "</table>";
 ?>
</span>
</html>