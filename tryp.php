<?php
// Start the session
session_start();
if(isset($_POST["excel"]))
{
	$dbname= $_POST["db"];
	$_SESSION["db"]=$dbname;
	$table= $_POST["table"];
	$_SESSION["table"]=$table;


	}

?>

<!DOCTYPE html>
<html>
<body>

<form action="student.php" method="post">
database name:<br>
<input type="text" name="db">
<br>
table name:<br>
<input type="text" name="table">
<br>

 <input type="submit" name="excel"></input>
</form>


</body>
</html>