<?php
session_start();
    require_once '../../Classes/Ergo.php';
    require_once '../../Classes/Database.php';

if (!isset($_POST['AddErgo'])) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="form-header">Add Project</h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="perigrafh">Project Description </label>
                <input type="text" id="perigrafh" name="perigrafh" required class="form-control">
            </div>  
        <div class="form-group">
                <label for="enarksh">Entry Date</label>
                <input type="date" id="enarksh" name="enarksh" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="lhksh">Closing Date</label>
                <input type="date" id="lhksh" name="lhksh" class="form-control">
            </div>
        <div class="clear-float"></div>
        <button style="float: left" type="submit" name="AddErgo" id="AddErgo" value="Προσθήκη" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Register</button>
        <button style="float: left; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
        <br><br>
        </form>
</body>
    
        
<?php 


                    }
                    else { //When I press Register button
                        $project=new Ergo();
                        
                        $project->perigrafh_ergou=$_POST["perigrafh"];
                        $project->start_date=$_POST["enarksh"];
                        $project->finish_date=$_POST["lhksh"];
                        
                        $project->setDb();
                    
                    ?>
<script>alert('Project Added!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    }
