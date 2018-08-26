<?php
// Start the session
session_start();


$dbname=$_SESSION['db'];
$table=$_SESSION['table'];


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
<form id="r2" action="excel.php" method="post">


<input type="submit" name="excel" value="download excel file"/>
</form>
<form action="table.php" method="post">


<input id="r1"type="submit" name="pdf" value="open in pdf" />
</form>

</body>
</html>

<?php
if(isset($_POST["excel"])){
$servername = "localhost";
$username = "root";
$password = "";


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

$sql0="DELETE FROM $table WHERE year=0";
$query0=mysqli_query($conn, $sql0) or die(mysqli_error($conn)) ;
echo "<h3 align='center'>students who doesn't have the payment record</h3>";
$sql = "SELECT reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN $table ON ($table.Enrollment_no = reappearfees.Enrollment_no)
WHERE $table.Enrollment_no IS NULL";

$query=mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query , MYSQLI_ASSOC))
{
	
$list  = "Enrollment_no".$row["Enrollment_no"]. " with reference".$row["ddno"]." don't have payment record";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $list;
echo "</td>";
echo "</tr>";
echo "<table>";

}

/*$sql1 = "SELECT bank3.Enrollment_no,bank3.ddno
FROM bank3
LEFT JOIN reappearfees ON (reappearfees.Enrollment_no = bank3.Enrollment_no)
WHERE reappearfees.Enrollment_no IS NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query1 , MYSQLI_ASSOC))
{
$list1 = "Enrollment_no".$row["Enrollment_no"]. "with reference".$row["ddno"]." haven't filled  the form";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $list1;
echo "</td>";
echo "</tr>";
echo "<table>";
}


$sq = "SELECT  reappearfees.ddno,reappearfees.Enrollment_no,bank3.ddno
FROM reappearfees
LEFT JOIN bank3 ON (bank3.ddno = reappearfees.ddno)
WHERE bank3.ddno IS NULL";

$queryy=mysqli_query($conn, $sq) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($queryy , MYSQLI_ASSOC))
{
$li =  "ref_id of roll_no ". $row["Enrollment_no"]." has not  matched";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $li;
echo "</td>";
echo "</tr>";
echo "<table>";
}



$sql2 = "SELECT reappearfees.date,reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN bank3 ON (bank3.date = reappearfees.date)
WHERE bank3.date IS NULL";

$query2=mysqli_query($conn, $sql2) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query2 , MYSQLI_ASSOC))
{
$list2 = "Enrollment_no".$row["Enrollment_no"]."with reference's".$row["ddno"]."  date is diffrent";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $list2;
echo "</td>";
echo "</tr>";
echo "<table>";

}



 $sql3 = "SELECT reappearfees.Enrollment_no, reappearfees.ddno,reappearfees.date,bank3.ddno,bank3.Enrollment_no,bank3.date,reappearfees.amount, bank3.amount 
FROM bank3
LEFT  JOIN reappearfees ON bank3.amount = reappearfees.amount WHERE reappearfees.amount IS NULL ";


$query3=mysqli_query($conn, $sql3) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query3 , MYSQLI_ASSOC))
{
$list3 = "Enrollment_no".$row["Enrollment_no"]."with reference".$row["ddno"]."   amount is diffrent";
echo "<table id='r3' border='1'>";

echo "<tr>";
echo "<td>";
echo $list3;
echo "</td>";
echo "</tr>";
echo "<table>";
}

*/

mysqli_close($conn);
}
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

<form action="sbicompare.php" method="post">
<input id="r1"type="submit" name="pdf" value="amount difference" />
</form>
<form action="sbicompare1.php" method="post">
<input id="r1"type="submit" name="pdf" value="form not filled" />
</form>

<form action="sbicompare2.php" method="post">
<input id="r1"type="submit" name="pdf" value="unmatched reference " />
</form>
<form action="sbicompare3.php" method="post">
<input id="r1"type="submit" name="pdf" value="unmatched date_of_payment" />
</form>

</body>
</html>
