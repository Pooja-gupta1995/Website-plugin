<?php
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "damu";

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


$sql = "SELECT reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN bank3 ON (bank3.Enrollment_no = reappearfees.Enrollment_no)
WHERE bank3.Enrollment_no IS NULL";

$query=mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query , MYSQLI_ASSOC))
{
	
$list  = "Enrollment_no".$row["Enrollment_no"]. " don't have payment record";
$pdf->Cell(4,10,$list,0,1);
}



$sql1 = "SELECT bank3.Enrollment_no
FROM bank3
LEFT JOIN reappearfees ON (reappearfees.Enrollment_no = bank3.Enrollment_no)
WHERE reappearfees.Enrollment_no IS NULL";

$query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query1 , MYSQLI_ASSOC))
{
$list1 = "Enrollment_no".$row["Enrollment_no"]. " haven't filled  the form";
$pdf->Cell(4,10,$list1,0,1);
}


$sq = "SELECT  reappearfees.ddno,reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN bank3 ON (bank3.ddno = reappearfees.ddno)
WHERE bank3.ddno IS NULL";

$queryy=mysqli_query($conn, $sq) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($queryy , MYSQLI_ASSOC))
{
$li =  "id ". $row["Enrollment_no"]. "  has not  matched";
$pdf->Cell(4,10,$li,0,1);
}



$sql2 = "SELECT reappearfees.date,reappearfees.Enrollment_no
FROM reappearfees
LEFT JOIN bank3 ON (bank3.date = reappearfees.date)
WHERE bank3.date IS NULL";

$query2=mysqli_query($conn, $sql2) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query2 , MYSQLI_ASSOC))
{
$list2 = "Enrollment_no".$row["Enrollment_no"]. "  date is diffrent";
$pdf->Cell(4,10,$list2,0,1);
}



$sql3 = "SELECT reappearfees.Enrollment_no, reappearfees.ddno,reappearfees.date,bank3.ddno,bank3.Enrollment_no,bank3.date,reappearfees.amount,bank3.amount
FROM bank3
LEFT JOIN reappearfees ON bank3.amount = reappearfees.amount
WHERE reappearfees.amount IS NULL ";

$query3=mysqli_query($conn, $sql3) or die(mysqli_error($conn)) ;
while($row = mysqli_fetch_array($query3 , MYSQLI_ASSOC))
{
$list3 = "Enrollment_no".$row["Enrollment_no"]. "  amount is diffrent";
$pdf->Cell(4,10,$list3,0,1);
}



$pdf->Output();





mysqli_close($conn);



?>