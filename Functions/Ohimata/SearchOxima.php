<?php
session_start();

require_once '../../Classes/Oxhma.php';
require_once '../../Classes/Database.php';

if (!filter_input(INPUT_POST,'search')) { ?>

<title>Search Vehicle</title>
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h1 class="form-header">Search Vehicle</h1> 
    <form action="" method="post"> 
        <div class="form-group">
                <label for="ar_kykloforias">Plate Number </label>
                <input type="text" id="ar_kykloforias" name="ar_kykloforias" class="form-control">
            </div>  
            <div class="form-group">
                <label for="xroma_oxhm">Color</label>
                <input type="text" id="xroma_oxhm" name="xroma_oxhm" class="form-control">
            </div>  
        <div class="form-group">
                <label for="montelo_oxhm">Model </label>
                <input type="text" id="montelo_oxhm" name="montelo_oxhm" class="form-control">
            </div> 
        <div class="form-group">
                <label for="marka_oxhm">Brand </label>
                <input type="text" id="marka_oxhm" name="marka_oxhm" class="form-control">
            </div>  
        <div class="form-group">
                <label for="odhgos">Driver </label>
                <input type="text" id="odhgos" name="odhgos" class="form-control">
            </div>  
        
        
            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="search" id="search" value="Αναζήτηση" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Search</button>
            <button style="float: left;color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
        </form>
    
 <?php   
}
else {

    $DB = new Database();
    $DB->connect();
    $sql = " SELECT `ar_kykloforias`, `xroma_oxhm`, montelo_oxhm, marka_oxhm, odhgos FROM `Oxhma`";
    $w = "where ?";

    $i = 0;
    $a = [];
    $a[$i++] = "1";


   if (filter_input(INPUT_POST,'ar_kykloforias') !== "") {
        $w = $w . " and ar_kykloforias = ? ";
        $a[$i++] = filter_input(INPUT_POST,'ar_kykloforias');
    }

    if (filter_input(INPUT_POST,'xroma_oxhm') !== "") {
        $w = $w . " and xroma_oxhm LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'xroma_oxhm'). "%" ;
    }
   
    if (filter_input(INPUT_POST,'montelo_oxhm') !== "") {
        $w = $w . " and montelo_oxhm LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'montelo_oxhm'). "%" ;
    }
    
    if (filter_input(INPUT_POST,'marka_oxhm') !== "") {
        $w = $w . " and marka_oxhm LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'marka_oxhm'). "%" ;
    }
    
    if (filter_input(INPUT_POST,'odhgos') !== "") {
        $w = $w . " and odhgos LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'odhgos'). "%" ;
    }
    ?>

<head>
<title> Search Vehicle</title>
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

    <div><table class="table table-bordered table-hover table-responsive" 
                style="                
                border-radius: 10px;
                padding-top: 5px;
                padding-left: 5px;
                padding-right: 5px;
                padding-bottom: 5px;
                max-width: available;
                margin: 0px;
                background-color: whitesmoke;">

            <thead>
                <tr style="background-color: #6699ff">

                    <th>Plate Number</th>
                    <th>Color</th>
                    <th>Model</th>
                    <th>Brand</th> 
                    <th>Driver</th> 
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $res = $DB->execute($sql . $w, $a);
                    
                    //-------------Μέτρηση αποτελεσμάτων εγγραφών---------//

                    if ($res->rowCount() == 1) {

                        echo "<h4>Found " . $res->rowCount() . " result! </h4>";
                    } else if ($res->rowCount() == 0) {

                        echo "<h4>Didn't find any results! </h4>";
                    } else {
                        echo "<h4>Found " . $res->rowCount() . " results! </h4>";
                    }

                    while ($row = $res->fetch()) {

                        $OximaSearch = new Oxhma();
                        $OximaSearch->ar_kykloforias = $row['ar_kykloforias'];
                        $OximaSearch->getDb();
                        
                        
                       
                       
                        echo "<td>" . $OximaSearch->ar_kykloforias . "</td>";
                        echo "<td>" . $OximaSearch->xroma_oxhm . "</td>";
                        echo "<td>" . $OximaSearch->montelo_oxhm . "</td>";
                        echo "<td>" . $OximaSearch->marka_oxhm . "</td>";
                        echo "<td>" . $OximaSearch->odhgos . "</td>";
                        ?>

                        <td class="">
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ohimata/ViewOxima.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewoximaid" value="<?php echo $OximaSearch->ar_kykloforias; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; height:40px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                            
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ohimata/EditOxima.php" target="_blank">
                            <input style=" display:none ;color: red;  width: 0px; height: 0px;" 
                                   type="text" name="editoximaid" value="<?php echo $OximaSearch->ar_kykloforias; ?>" readonly>
                            <button type="submit" title="Edit" style="width:120px; height:40px; background-color:green" class="btn-large">
                                <i>Edit</i></button>
                        </form>
                            
                            
                            
                            
                            
                        <?php
                        if ($_SESSION['user_type_ergazom']==1) { ?>
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ohimata/DeleteOxima.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="deloximaid" value="<?php echo $OximaSearch->ar_kykloforias;?>" readonly>
                            <button type="submit" title="Delete" style="width:120px; height:40px; background-color:red;" class="btn-large">
                                <i>Delete</i></button>
                        </form> <?php } ?>

                    </td>

                        <?php
                        echo "</tr>";
                    }
                    ?>

                    <?php
                    echo "</tbody></table></div>";
                }


