<?php
require_once '../../Classes/Oxhma.php';
include '../../Classes/Database.php';


if (!filter_input(INPUT_POST,'AddVehicle')) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vehicles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="form-header">Add Vehicle </h1>
    <form action="" method="post">     
                    <div class="form-group">
                <label for="ar_kykloforias">Plate Number </label>
                <input type="text" id="ar_kykloforias" name="ar_kykloforias" required class="form-control">
            </div> 
            <div class="form-group">
                <label for="markaOxim">Brand </label>
                <input type="text" id="markaOxim" name="markaOxim" required class="form-control">
            </div>  
        <div class="form-group">
                <label for="monteloOxim">Model </label>
                <input type="text" id="monteloOxim" name="monteloOxim" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="xromaOxim">Color</label>
                <input type="text" id="xromaOxim" name="xromaOxim" required class="form-control">
            </div>  
         <div class="form-group">
             
                <label for="odigos">Driver</label>
                    <select id="odigos" name="odigos" class="form-control">
                        <option value="NULL"> - </option>
                        <?php 
                  
                            $DB = new Database();
                            $DB->connect();
                            $sql = "SELECT `kwd_ergazomenou`, `Eponymo_ergazom`, `Onoma_Ergazom` FROM `ergazomenos`;";
                            $res = $DB->execute($sql,[]);
                            echo $res->rowCount() ;
                            if ($res->rowCount() != 0) {
                                while($row = $res->fetch()){                            
                                    echo "<option value='".$row["kwd_ergazomenou"]."'>".$row["kwd_ergazomenou"]. " - ".$row["Onoma_Ergazom"]. " ".$row["Eponymo_ergazom"]."</option>";
                                }
                            }
                        
                        ?>
                    </select>
         
         </div> 
        <div class="clear-float"></div>      
        <button style="float: left; text-align: center" type="submit" name="AddVehicle" id="AddVehicle" value="Προσθήκη" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Register</button>
        <button style="float: left; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
        <br><br>
        </form>    
</body> 
       
<?php 

                    }
                    else { 
                       
                        $oxima = new Oxhma();
                        $oxima->ar_kykloforias = filter_input(INPUT_POST,'ar_kykloforias');
                        $oxima->marka_oxhm = filter_input(INPUT_POST,'markaOxim');
                        $oxima->montelo_oxhm = filter_input(INPUT_POST,'monteloOxim');
                        $oxima->xroma_oxhm = filter_input(INPUT_POST,'xromaOxim');
                        $oxima->odhgos = filter_input(INPUT_POST,'odigos');
                        $oxima->setDb();
?>
<script>alert('Vehicle Added!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

