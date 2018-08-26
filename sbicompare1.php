


<?php
// Start the session
session_start();


$dbname=$_SESSION['db'];
$table=$_SESSION['table'];
//put the database name of bank database and table and reappearfees is the merging table of all the college students who have to give reappear,fine or suppliment for a exam


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

echo "<h3 align='center'>students who havenot filled the form</h3>";
$sql4 = "  SELECT $table.Enrollment_no,$table.ddno
FROM $table
LEFT JOIN reappearfees ON (reappearfees.ddno = $table.ddno)
WHERE reappearfees.Enrollment_no IS NULL";




$query4=mysqli_query($conn, $sql4) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query4 , MYSQLI_ASSOC))
{
$list4 = $row["Enrollment_no"]." havenot filled the form ";
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
<form id="r2" action="excel2.php" method="post">
<input type="submit" name="excel" value="download excel file"/>
</form>
<form action="table2.php" method="post">
<input id="r1"type="submit" name="pdf" value="open in pdf" />
</form>
</body>
</html>