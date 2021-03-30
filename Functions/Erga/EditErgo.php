<?php

session_start();

require_once '../../Classes/Ergo.php';
require_once '../../Classes/Database.php';

if ((filter_input(INPUT_POST,'editergoid')) && (!filter_input(INPUT_POST,'editergoid2'))) {
    $editergo=new Ergo();
    $editergo->kwd_ergou=filter_input(INPUT_POST,'editergoid');
    $editergo->getDb();
    
    ?>
<head>
  <title>Edit Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <h1 class="form-header">Edit Project </h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="editergoid2">ID</label>
                <input type="text" id="editergoid2" name="editergoid2" value="<?php echo filter_input(INPUT_POST,'editergoid'); ?>" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="perigrafh_ergou">Description</label>
                <input type="text" id="perigrafh_ergou" name="perigrafh_ergou" value="<?php echo $editergo->perigrafh_ergou; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Entry Date</label>
                <input type="date" id="start_date" name="start_date" value="<?php echo $editergo->start_date; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="finish_date">Closing Date</label>
                <input type="date" id="finish_date" name="finish_date" value="<?php echo $editergo->finish_date; ?>"  class="form-control" required>
            </div>

            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="EditErgo" id="EditErgo" value="Ενημέρωση" class="btn btn-info "><span class="glyphicon glyphicon-retweet"></span> Update </button>
            <button style="float: left ; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
    </form>

    <?php
} else {
    
    $editergofinal= new Ergo();
    $editergofinal->kwd_ergou=filter_input(INPUT_POST,'editergoid2');
    $editergofinal->perigrafh_ergou=filter_input(INPUT_POST,'perigrafh_ergou');
    $editergofinal->start_date=filter_input(INPUT_POST,'start_date');
    $editergofinal->finish_date=filter_input(INPUT_POST,'finish_date');
    $editergofinal->updateDb();
    
?>
<script>alert('Project Updated!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

