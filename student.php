<?php
session_start();
if(isset($_POST["excel"]))
{
	$dbname= $_POST["db"];
	$_SESSION["db"]=$dbname;
	$table= $_POST["table"];
	$_SESSION["table"]=$table;
	
	}
	?>

<html>
<head><title>SBI</title>
<style>


</style>
</head>
<body style="background-color:#F3FBFB;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<B><font size=30>Plugin to SBI Collect</font></B>
<hr style="height:2px;border:none;color:#333;background-color:#333;" />
<br/><br/>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <div class="container">
 
 <h3> first click on the convert payment data into excel format to upload csv file into database then click on the following buttons</h3>
   <center>
  <form id="r2" action="browse1.php" method="post">

<input type="submit" name="excel" value="upload reappear file"/>
</form>

  <form id="r2" action="browse2.php" method="post">

<input type="submit" name="excel" value="upload supplement file"/>
</form>
<form id="r2" action="browse3.php" method="post">

<input type="submit" name="excel" value="upload fine file"/>
</form>
<form id="r2" action="merge.php" method="post">

<input type="submit" name="excel" value="continue after merging"/>
</form>
  </form>
  </center>
</div>

</body>
</html>
