<?php

session_start();

require_once '../../Classes/Ekpaideysh.php';
require_once '../../Classes/Database.php';

if ((filter_input(INPUT_POST,'editptyxioid')) && (!filter_input(INPUT_POST,'editptyxioid2'))) {
    $editptyxio=new Ekpaideysh();
    $editptyxio->kwd_ptyxio=filter_input(INPUT_POST,'editptyxioid');
    $editptyxio->getDb();
    
    ?>
<head>
  <title>Edit Certificate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <h1 class="form-header">Edit Certificate </h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="editptyxioid2">ID</label>
                <input type="text" id="editptyxioid2" name="editptyxioid2" value="<?php echo filter_input(INPUT_POST,'editptyxioid'); ?>" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="per_ptyxiou">Certificate</label>
                <input type="text" id="per_ptyxiou" name="per_ptyxiou" value="<?php echo $editptyxio->per_ptyxiou; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="vathmos">Grade</label>
                <input type="text" id="vathmos" name="vathmos" value="<?php echo $editptyxio->vathmos; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_apokthshs">Graduation Date</label>
                <input type="date" id="date_apokthshs" name="date_apokthshs" value="<?php echo $editptyxio->date_apokthshs; ?>"  class="form-control" required>
            </div>

            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="EditPtyxio" id="EditPtyxio" value="Ενημέρωση" class="btn btn-info "><span class="glyphicon glyphicon-retweet"></span> Update </button>
            <button style="float: left ; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
    </form>

    <?php
} else {
    
    $editptyxiofinal= new Ekpaideysh();
    $editptyxiofinal->kwd_ptyxio=filter_input(INPUT_POST,'editptyxioid2');
    $editptyxiofinal->per_ptyxiou=filter_input(INPUT_POST,'per_ptyxiou');
    $editptyxiofinal->vathmos=filter_input(INPUT_POST,'vathmos');
    $editptyxiofinal->date_apokthshs=filter_input(INPUT_POST,'date_apokthshs');
    $editptyxiofinal->updateDb();
    
?>
<script>alert('Certificate Updated!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

