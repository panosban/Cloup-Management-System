<?php

session_start();

require_once '../../Classes/Ergo.php';
require_once '../../Classes/Database.php';

if ((filter_input(INPUT_POST,'editOximid')) && (!filter_input(INPUT_POST,'editOximid2'))) {
    $editoxima=new Oxhma();
    $editoxima->ar_kykloforias=filter_input(INPUT_POST,'editOximid');
    $editoxima->getDb();
    
    ?>
<head>
  <title>Edit Vehicle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <h1 class="form-header">Edit Vehicle </h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="editOximid2">Plate Number</label>
                <input type="text" id="editOximid2" name="editOximid2" value="<?php echo filter_input(INPUT_POST,'editOximid'); ?>" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="xromaOxim">Color</label>
                <input type="text" id="xromaOxim" name="xromaOxim" value="<?php echo $editoxima->xroma_oxhm; ?>"  class="form-control" required>
            </div>
           <div class="form-group">
                <label for="monteloOxim">Model</label>
                <input type="text" id="monteloOxim" name="monteloOxim" value="<?php echo $editoxima->montelo_oxhm; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="markaOxim">Brand</label>
                <input type="text" id="markaOxim" name="markaOxim" value="<?php echo $editoxima->marka_oxhm; ?>"  class="form-control" required>
            </div>
                    <div class="form-group">
                <label for="odigos">Driver</label>
                <input type="text" id="odigos" name="odigos" value="<?php echo $editoxima->odhgos; ?>"  class="form-control" required>
            </div>

            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="EditOxima" id="EditOxima" value="Ενημέρωση" class="btn btn-info "><span class="glyphicon glyphicon-retweet"></span> Update </button>
            <button style="float: left ; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
    </form>

    <?php
} else{
    
    $editoximafinal = new Oxhma();
    $editoximafinal->ar_kykloforias = filter_input(INPUT_POST,'editoxhmid2');
    $editoximafinal->xroma_oxhm = filter_input(INPUT_POST,'xromaOxim');
    $editoximafinal->montelo_oxhm = filter_input(INPUT_POST,'monteloOxim');
    $editoximafinal->marka_oxhm = filter_input(INPUT_POST,'markaOxim');
    $editoximafinal->odhgos = filter_input(INPUT_POST,'odigos');
    $editoximafinal->updateDb();
    
?>
<script>alert('Vehicle Updated!');</script>
<script> location.replace("../../LoggedInPage.php"); </script>//<?php
                    
                    }

