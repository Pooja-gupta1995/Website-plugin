<html>
<head>
</head>
<body>
<form action="excel.php" method="post">
<input type="submit" name="excel" value="excel"/>
</form>
<form action="pdf.php" method="post">
<input type="submit" name="pdf" value="pdf"/>
</form>
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "name of database";//or yan use session to get the database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$list="";
$list1="";
$li="";
$list2="";
$list3="";


$sql = "SELECT students.roll_no
FROM students
LEFT JOIN banks ON (banks.roll_no = students.roll_no)
WHERE banks.roll_no IS NULL";//change the name of files with those you want to compare as it is giving us the deatils of the student who donot have payment record

$query=mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query , MYSQLI_ASSOC))
{
	
$list  = "roll_no".$row["roll_no"]. " don't have payment record";
echo $list;
}
mysqli_close($conn);
?>