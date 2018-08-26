
<?php
// Start the session
session_start();


$dbname=$_SESSION['db'];
$table=$_SESSION['table'];



$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$list4="";

echo "<h3 align='center'>students whose reference id is not matched</h3>";
$sql4 = " SELECT  reappearfees.ddno,reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN $table ON ($table.ddno = reappearfees.ddno)
WHERE $table.ddno IS NULL ";




$query4=mysqli_query($conn, $sql4) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query4 , MYSQLI_ASSOC))
{
$list4 = $row["Enrollment_no"]." reference id has not matched ";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $list4;
echo "</td>";
echo "</tr>";
echo "<table>";
}

mysqli_close($conn);

?>
<html>
<head>
<style>

#r1{
	margin-left :10px;
	margin-top : 10px;
	float : right;
}
#r2{
	margin-left :10px;
	margin-top : 10px;
	float : right;
}

#r3{
    width : 1000px;
	margin : 10px;
	padding : 1px;
}	

</style>
</head>
<body>
<form id="r2" action="excel3.php" method="post">
<input type="submit" name="excel" value="download excel file"/>
</form>
<form action="table3.php" method="post">
<input id="r1"type="submit" name="pdf" value="open in pdf" />
</form>
</body>
</html>