
<?php
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

$sql2 = "Alter table reappearfees DROP id ";

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

$sql4 = "Alter table supplementfees DROP id ";

if (mysqli_query($conn, $sql4)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
}

$sql3 = "Alter table reappearfees ADD Primary Key (ddno)";

if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
$sql5 = "Alter table reappearfees Drop Primary Key";

if (mysqli_query($conn, $sql5)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
}

$sql = "Insert into reappearfees select * from supplementfees";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql1 = "Insert into reappearfees select * from studentfines";

if (mysqli_query($conn, $sql1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
<html>
<head>
<style>


#r2{
	margin-left :600px;
	margin-top : 100px;
	
}



</style>
</head>
<body>
<form id="r2" action="try3.php" method="post">

<input type="submit" name="excel" value="click to continue"/>
</form>

</body>
</html>