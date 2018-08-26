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
$output='';
$output3='';
$output1='';
$output2='';
$output5='';

/*if(isset($_POST["excel"]))
{
	$sql = "SELECT reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN bank3 ON (bank3.Enrollment_no = reappearfees.Enrollment_no)
WHERE bank3.Enrollment_no IS NULL";

$query=mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query )> 0)
{
	$output .= '
	<table border="1px solid black">
	<tr>
	<th>id</th>
	<th>ddno</th>
	<th>details</th>
	</tr> ';
	
	
while($row = mysqli_fetch_array($query))
{
	
$output .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"dont have payment record"</td>
</tr> ';
}
$output .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output;
}
}

/*if(isset($_POST["excel"]))
{
	$sql3 = 
$sql3 = "SELECT reappearfees.Enrollment_no, reappearfees.ddno,reappearfees.date,bank3.ddno,bank3.Enrollment_no,bank3.date,reappearfees.amount,bank3.amount
FROM bank3
LEFT JOIN reappearfees ON bank3.amount = reappearfees.amount
WHERE reappearfees.amount IS NULL ";

$query3=mysqli_query($conn, $sql3) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query3)> 0)
{
	$output3 .= '
	<table border="1px solid black">
	<tr>

	</tr> ';
	
	
while($row = mysqli_fetch_array($query3))
{
	
$output3 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"amount is different"</td>
</tr> ';
}
$output3 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output3;
}
}

if(isset($_POST["excel"]))
{
	

$sql2 = "SELECT reappearfees.date,reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN bank3 ON (bank3.date = reappearfees.date)
WHERE bank3.date IS NULL";

$query2=mysqli_query($conn, $sql2) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query2)> 0)
{
	$output2 .= '
	<table border="1px solid black">
	<tr>

	</tr> ';
	
	
while($row = mysqli_fetch_array($query2))
{
	
$output2 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"date is different"</td>
</tr> ';
}
$output2 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output2;
}
}*/


$sql1 = "SELECT reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN $table ON ($table.Enrollment_no = reappearfees.Enrollment_no)
WHERE $table.Enrollment_no IS NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query1)> 0)
{
	$output1 .= '
	<table border="1px solid black">
	<tr>

	</tr> ';
	
	
while($row = mysqli_fetch_array($query1))
{
	
$output1 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"dont have payment record"</td>
</tr> ';
}
$output1 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output1;
}


/*if(isset($_POST["excel"]))
{
	
$sql1 = "SELECT bank3.Enrollment_no,bank3.ddno
FROM bank3
LEFT JOIN reappearfees ON (reappearfees.Enrollment_no = bank3.Enrollment_no)
WHERE reappearfees.Enrollment_no IS NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query1)> 0)
{
	$output1 .= '
	<table border="1px solid black">
	<tr>

	</tr> ';
	
	
while($row = mysqli_fetch_array($query1))
{
	
$output1 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"havenot filled the form"</td>
</tr> ';
}
$output1 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output1;
}
}
if(isset($_POST["excel"]))
{
$sq = "SELECT  reappearfees.ddno,reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN bank3 ON (bank3.ddno = reappearfees.ddno)
WHERE bank3.ddno IS NULL";

$queryy=mysqli_query($conn, $sq) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($queryy)> 0)
{
	$output5 .= '
	<table border="1px solid black">
	<tr>

	</tr> ';
	
	
while($row = mysqli_fetch_array($queryy))
{
	
$output5 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"ref id is not matched"</td>
</tr> ';
}
$output5 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output5;
}
}*/




mysqli_close($conn);


?>
