<?php

session_start();

require_once '../../Classes/Tmhma.php';
require_once '../../Classes/Database.php';

if ((filter_input(INPUT_POST,'edittmhmaid')) && (!filter_input(INPUT_POST,'edittmhmaid2'))) {
    $edittmhma = new Tmhma();
    $edittmhma->kwd_tmhmatos = filter_input(INPUT_POST,'edittmhmaid');
    $edittmhma->getDb();
    
    ?>
<head>
  <title>Edit Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <h1 class="form-header">Edit Department </h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="edittmhmaid2">Department ID</label>
                <input type="text" id="edittmhmaid2" name="edittmhmaid2" value="<?php echo filter_input(INPUT_POST,'edittmhmaid'); ?>" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="onoma_tmhmatos">Department's Name</label>
                <input type="text" id="onoma_tmhmatos" name="onoma_tmhmatos" value="<?php echo $edittmhma->onoma_tmhmatos; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kwd_proistamenou">Supervisor ID</label>
                <input type="text" id="kwd_proistamenou" name="kwd_proistamenou" value="<?php echo $edittmhma->kwd_proistamenou; ?>"  class="form-control" required>
            </div>

            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="EditTmhma" id="EditTmhma" value="Ενημέρωση" class="btn btn-info "><span class="glyphicon glyphicon-retweet"></span> Update </button>
            <button style="float: left ; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
    </form>

    <?php
} else {
    
    $edittmhmafinal= new Tmhma();
    $edittmhmafinal->kwd_tmhmatos = filter_input(INPUT_POST,'edittmhmaid2');
    $edittmhmafinal->onoma_tmhmatos = filter_input(INPUT_POST,'onoma_tmhmatos');
    $edittmhmafinal->kwd_proistamenou = filter_input(INPUT_POST,'kwd_proistamenou');
    $edittmhmafinal->updateDb();
    
?>
<script>alert('Department Updated!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

