<?php
require_once '../../Classes/Ekpaideysh.php';
require_once '../../Classes/Database.php';


if (!filter_input(INPUT_POST,'AddDegree')) { ?>

<html lang="en">
<head>
  <title>Add Certificate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
  
<body>
    <h1 class="form-header">Add Certificate</h1>
    <form action="" method="post">     
            <div class="form-group">
                <label for="per_ptyxiou"> Certificate </label>
                <input type="text" id="per_ptyxiou" name="per_ptyxiou" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="vathmos"> Grade </label>
                <input type="text" id="vathmos" name="vathmos" required class="form-control">
            </div> 
            <div class="form-group">
                <label for="date_apokthshs"> Graduation </label>
                <input type="date" id="date_apokthshs" name="date_apokthshs" required class="form-control">
            </div>  
                 
                <div class="clear-float"></div>
            <button style="float: left" type="submit" name="AddDegree" id="AddDegree" value="Προσθήκη Πτυχίου" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Register </button>
            <button style="float: left; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            <br><br>
        </form>
</body>
    
<?php 

                    }
                    else { 
                        $ptyxio=new Ekpaideysh();
                        $ptyxio->per_ptyxiou=filter_input(INPUT_POST,"per_ptyxiou");
                        $ptyxio->vathmos=filter_input(INPUT_POST,"vathmos");
                        $ptyxio->date_apokthshs=filter_input(INPUT_POST,"date_apokthshs");
                        $ptyxio->setDb();
                            ?>
<script>alert('Certificate Added!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

