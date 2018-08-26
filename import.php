



<?php
include 'db.php';
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
$sql = "INSERT into bank3 (`exam_fee`, `type_of_payment`, `du_ref_no`,`date_of_payment`,`status`, `enrollment_no`,`name`,`programme`, `branch`, `year`,`other`, `dob`,`ammount`) 
values('','$emapData[1]','$emapData[2]','$newDate','$emapData[5]','$emapData[7]','$emapData[9]','$emapData[11]','$emapData[13]','$emapData[15]','$emapData[17]','$emapData[19]','$emapData[21]')";
//we are using mysql_query function. it returns a resource on true else False on error
$result = mysql_query( $sql, $conn );
if(! $result )
{
echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
window.location = \"index.php\"
</script>";
}
}
fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
window.location = \"index.php\"
</script>";
//close of connection
mysql_close($conn); 
}
} 
?> 

