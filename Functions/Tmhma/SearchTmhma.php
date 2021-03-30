<?php
session_start();
require_once '../../Classes/Ergazomenos.php';
require_once '../../Classes/Database.php';
require_once '../../Classes/Tmhma.php';

if (!filter_input(INPUT_POST,'search')) { ?>
<title>Search Department</title>
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h1 class="form-header">Search Department</h1> 
    <form action="" method="post"> 
        <div class="form-group">
                <label for="kwd_tmhmatos">Department ID </label>
                <input type="text" id="kwd_tmhmatos" name="kwd_tmhmatos" class="form-control">
            </div>  
            <div class="form-group">
                <label for="onoma_tmhmatos">Department's Name</label>
                <input type="text" id="onoma_tmhmatos" name="onoma_tmhmatos" class="form-control">
            </div>  
        <div class="form-group">
                <label for="start_date">Supervisor ID</label>
                <input type="date" id="kwd_proistamenou" name="kwd_proistamenou" class="form-control">
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
    $sql = " SELECT `kwd_tmhmatos`, `onoma_tmhmatos`, `kwd_proistamenou` FROM `tmhma`";
    $w = "where ?";

    $i = 0;
    $a = [];
    $a[$i++] = "1";


   if (filter_input(INPUT_POST,'kwd_tmhmatos') !== "") {
        $w = $w . " and kwd_tmhmatos = ? ";
        $a[$i++] = filter_input(INPUT_POST,'kwd_tmhmatos');
    }

    if (filter_input(INPUT_POST,'onoma_tmhmatos') !== "") {
        $w = $w . " and onoma_tmhmatos LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'onoma_tmhmatos'). "%" ;
    }
    if (filter_input(INPUT_POST,'kwd_proistamenou') !== "") {
    $w = $w . " and kwd_proistamenou LIKE ? ";
    $a[$i++] ="%" . filter_input(INPUT_POST,'kwd_proistamenou'). "%" ;
    }
   
    
    ?>

<head>
<title> Search Department</title>
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

                    <th>Department ID</th>
                    <th>Department's Name</th>
                    <th>Supervisor ID</th>
<!--                    <th>Actions</th>-->
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

                        $tmhmaSearch = new Tmhma();
                        $tmhmaSearch->kwd_tmhmatos = $row['kwd_tmhmatos'];
                        $tmhmaSearch->getDb();
                        
                        
                       
                       
                        echo "<td>" . $tmhmaSearch->kwd_tmhmatos . "</td>";
                        echo "<td>" . $tmhmaSearch->onoma_tmhmatos . "</td>";
                        echo "<td>" . $tmhmaSearch->kwd_proistamenou . "</td>";
                        ?>

<!--                        <td class="">
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Tmhma/ViewTmhma.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewergoid" value="<?php echo $tmhmaSearch->kwd_tmhmatos; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; height:40px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                            
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Erga/EditErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="editergoid" value="<?php echo $tmhmaSearch->kwd_tmhmatos; ?>" readonly>
                            <button type="submit" title="Edit" style="width:120px; height:40px; background-color:green;" class="btn-large">
                                <i>Edit</i></button>
                        </form>
                            
                            
                            
                            
                            
                        <?php
                        if ($_SESSION['user_type_ergazom']==1) { ?>
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Erga/DeleteErgο.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delergoid" value="<?php echo $tmhmaSearch->kwd_tmhmatos;?>" readonly>
                            <button type="submit" title="Delete" style="width:120px; height:40px; background-color:red;" class="btn-large">
                                <i>Delete</i></button>
                        </form> <?php } ?>

                    </td>-->

                        <?php
                        echo "</tr>";
                    }
                    ?>

                    <?php
                    echo "</tbody></table></div>";
                }

