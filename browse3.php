<?php
// Start the session
session_start();


$dbname=$_SESSION['db'];
$table=$_SESSION['table'];



?>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Import Excel To Mysql Database Using PHP </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Import Excel File To MySql Database Using php">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>    
    <br><br>
        <div class="container">
            <div class="row">
            
    <br>
                <div class="col-md-3 hidden-phone"></div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="importsql3.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>upload fine file</legend>
                            <div class="control-group">
                                <div class="control-label">

                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            
</body>
</html>