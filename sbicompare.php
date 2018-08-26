
<?php

// Start the session
session_start();


$dbname=$_SESSION['db'];//put the database name of bank database and table and reappearfees is the merging table of all the college students who have to give reappear,fine or suppliment for a exam
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
echo "positive difference represents : bank need to return that amount
negative difference represents : student need to pay that much amount";

$sql4 = "  SELECT   $table.Enrollment_no ,$table.amount, reappearfees.amount ,reappearfees.ddno,$table.ddno, $table.amount-
   reappearfees.amount as Difference
FROM $table
LEFT JOIN reappearfees
  ON $table.Enrollment_no = reappearfees.Enrollment_no
  WHERE reappearfees.Enrollment_no IS NOT NULL 
	GROUP BY  reappearfees.Enrollment_no
	HAVING COUNT(reappearfees.Enrollment_no)=1
  ";


$query4=mysqli_query($conn, $sql4) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query4 , MYSQLI_ASSOC))
{

$list4 = $row["Enrollment_no"]." 's amount difference is ".$row["Difference"];
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
<form id="r2" action="excel1.php" method="post">
<input type="submit" name="excel" value="download excel file"/>
</form>
<form action="table1.php" method="post">
<input id="r1"type="submit" name="pdf" value="open in pdf" />
</form>
</body>
</html>