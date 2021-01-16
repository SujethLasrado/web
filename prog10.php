<!DOCTYPE HTML>
<html>
<head>
<title>STUDENT RECORDS</title>
</head>
<body>
<?php
$a=[]; //array to store all usn
$servername="localhost";
$username="root";
$password="123";
$dbname="STUDENTDB";
$conn=mysqli_connect($servername,$username,$password,$dbname)
or die(mysqli_connect_error());
$sql="SELECT * FROM STUDENT";
$result=mysqli_query($conn,$sql);
echo "<br>";
echo "<center><h1>BEFORE SORTING</h1></center>";
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>";
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>".$row["USN"]."</td>";
echo "<td>".$row["NAME"]."</td>";
echo "<td>".$row["ADDRESS"]."</td></tr>";
array_push($a, $row["USN"]);
}
echo "</table>";
}
else
{
echo "<h1>Table Is Empty</h1>";
echo "</table>";
}
$n=count($a); //length of array a
for($i=0;$i<($n-1);$i++)
{
for($j=$i+1;$j<$n;$j++)
{
if($a[$j]<$a[$i])
{
$temp=$a[$i];
$a[$i]=$a[$j];
$a[$j]=$temp;
}
}
}
$b=[];
$c=[];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
for($i=0;$i<$n;$i++)
{
if($row["USN"]==$a[$i])
{
$b[$i]=$row["NAME"];
$c[$i]=$row["ADDRESS"];
}
}
}
}
echo "<br>";
echo "<center><h1>AFTER SORTING</h1></center>";
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>";
echo "<br>";
for($i=0;$i<$n;$i++)
{
echo "<tr>";
echo "<td>".$a[$i]."</td>";
echo "<td>".$b[$i]."</td>";
echo "<td>".$c[$i]."</td></tr>";
}
echo "</table>"
?>
</body>
</html>
