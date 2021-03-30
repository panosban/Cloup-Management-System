<?php
    require_once '../../Classes/Tmhma.php';
    require_once '../../Classes/Database.php';

if (!filter_input(INPUT_POST,'AddTmhma')) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    
<body>
    <h1 class="form-header">Add Department: </h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="kwd_tmhmatos">Department ID</label>
                <input type="text" id="kwd_tmhmatos" name="kwd_tmhmatos" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="onoma_tmhmatos">Department Name</label>
                <input type="tex" id="onoma_tmhmatos" name="onoma_tmhmatos" required class="form-control">
            </div> 
            <div class="form-group">
                <label for="kwd_proistamenou">Supervisor's ID</label>
                <input type="text" id="kwd_proistamenou" name="kwd_proistamenou" class="form-control">
            </div>
        <div class="clear-float"></div>
        <button style="float: left" type="submit" name="AddTmhma" id="AddTmhma" value="Προσθήκη" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Register </button>
        <button style="float: left; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
        <br><br>
    </form>
</body>    
        
<?php 

                    }
                    else { //When Register button is selected!
                        $tmhma=new Tmhma();
                        $tmhma->kwd_tmhmatos=filter_input(INPUT_POST,"kwd_tmhmatos");
                        $tmhma->onoma_tmhmatos=filter_input(INPUT_POST,"onoma_tmhmatos");
                        $tmhma->kwd_proistamenou=filter_input(INPUT_POST,"kwd_proistamenou");
                        $tmhma->setDb();
?>
<script>alert('Department Added!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }