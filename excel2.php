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
$output='';
$output3='';
$output1='';
$output2='';
$output5='';

/*if(isset($_POST["excel"]))
{
	$sql = "SELECT reappearfees.Enrollment_no,reappearfees.ddno
FROM reappearfees
LEFT JOIN $table ON ($table.Enrollment_no = reappearfees.Enrollment_no)
WHERE $table.Enrollment_no IS NULL";

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
$sql3 = "SELECT reappearfees.Enrollment_no, reappearfees.ddno,reappearfees.date,$table.ddno,$table.Enrollment_no,$table.date,reappearfees.amount,$table.amount
FROM $table
LEFT JOIN reappearfees ON $table.amount = reappearfees.amount
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
LEFT JOIN $table ON ($table.date = reappearfees.date)
WHERE $table.date IS NULL";

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
}
if(isset($_POST["excel"]))
{
	

$sql1 = " SELECT $table.Enrollment_no, $table.amount, reappearfees.amount,reappearfees.ddno,$table.ddno, $table.amount-reappearfees.amount as Difference
FROM $table
LEFT  JOIN reappearfees
  ON $table.Enrollment_no = reappearfees.Enrollment_no
  WHERE reappearfees.Enrollment_no IS NOT NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query1)> 0)
{
	$output1 .= '
	<table border="1px solid black">
	<tr>

	<th>id</th>
	<th>du_ref_no</th>
	<th>details</th>
	<th>difference</th>
	</tr>
	';
	
	
while($row = mysqli_fetch_array($query1))
{
	
$output1 .= '
<tr>
<td>'.$row["Enrollment_no"].'</td>
<td>'.$row["ddno"].'</td>
<td>"amount difference "</td>
<td>'.$row["Difference"].'</td>
</tr>';
}
$output1 .='</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename=download.xls");
echo $output1;
}
}*/


	
$sql1 = "SELECT $table.Enrollment_no,$table.ddno
FROM $table
LEFT JOIN reappearfees ON (reappearfees.Enrollment_no = $table.Enrollment_no)
WHERE reappearfees.Enrollment_no IS NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
if(mysqli_num_rows($query1)> 0)
{
	$output1 .= '
	<table border="1px solid black">
	<tr>
<th>id</th>
	<th>du_ref_no</th>
	<th>details</th>
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

/*if(isset($_POST["excel"]))
{
$sq = "SELECT  reappearfees.ddno,reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN $table ON ($table.ddno = reappearfees.ddno)
WHERE $table.ddno IS NULL";

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
