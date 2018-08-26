<?php
// Start the session
session_start();



$dbname=$_SESSION['db'];//specify the bank csv file database and table
$table=$_SESSION['table'];

$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["Import"])){





echo $filename=$_FILES["file"]["tmp_name"];

if($_FILES["file"]["size"] > 0)
{

$file = fopen($filename, "r");
while (($emapData = fgetcsv($file, 10000, "~")) !== FALSE)
{
$new1=strtotime($emapData[3]);
$new2=date("d-m-y",$new1);
 $newDate = implode('-', array_reverse(explode('-', $new2)));
 
//It wiil insert a row to our subject table from our csv file`
//use the column which are there in your bank csv file
$sql1 = "INSERT into $table(`exam_fee`, `type_of_payment`, `ddno`,`date`,`status`, `Enrollment_no`,`name`,`programme`, `branch`, `year`,`other`, `dob`,`amount`) 
values('','$emapData[1]','$emapData[2]','$newDate','$emapData[5]','$emapData[7]','$emapData[9]','$emapData[11]','$emapData[13]','$emapData[15]','$emapData[17]','$emapData[19]','$emapData[21]')";
//we are using mysql_query function. it returns a resource on true else False on error
$result = mysqli_query(  $conn ,$sql1);
}
if( !$result )
{
echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
window.location = \"indexsbi.php\"
</script>";
}

fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
window.location = \"indexsbi.php\"
</script>";


//close of connection
mysqli_close($conn); 
}
} 
?> 

