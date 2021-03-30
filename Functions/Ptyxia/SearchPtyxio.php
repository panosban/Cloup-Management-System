<?php
session_start();

require_once '../../Classes/Ekpaideysh.php';
require_once '../../Classes/Database.php';

if (!isset(filter_input(INPUT_POST,'search'))) { ?>


<title>Search Certificate</title>
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <form action="" method="post"> 
        <div class="form-group">
                <label for="kwd_ptyxio">ID </label>
                <input type="text" id="kwd_ptyxio" name="kwd_ptyxio" class="form-control">
            </div>  
            <div class="form-group">
                <label for="per_ptyxiou">Certificate</label>
                <input type="text" id="per_ptyxiou" name="per_ptyxiou" class="form-control">
            </div>  
        <div class="form-group">
                <label for="vathmos">Grade </label>
                <input type="text" id="vathmos" name="vathmos" class="form-control">
            </div> 
        <div class="form-group">
                <label for="date_apokthshs">Graduation Date </label>
                <input type="date" id="date_apokthshs" name="date_apokthshs" class="form-control">
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
    $sql = " SELECT `kwd_ptyxio`, `per_ptyxiou`, `vathmos`, date_apokthshs FROM `ekpaideysh`";
    $w = "where ?";

    $i = 0;
    $a = [];
    $a[$i++] = "1";


   if (filter_input(INPUT_POST,'kwd_ptyxio') !== "") {
        $w = $w . " and kwd_ptyxio = ? ";
        $a[$i++] = filter_input(INPUT_POST,'kwd_ptyxio');
    }

    if (filter_input(INPUT_POST,'per_ptyxiou') !== "") {
        $w = $w . " and per_ptyxiou LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'per_ptyxiou'). "%" ;
    }
   
    if (filter_input(INPUT_POST,'vathmos') != "") {
        $w = $w . " and vathmos LIKE ? ";
        $a[$i++] ="%" . filter_input(INPUT_POST,'vathmos'). "%";
    }
    
    if (filter_input(INPUT_POST,'date_apokthshs') != "") {
        $w = $w . " and date_apokthshs LIKE ?";
        $a[$i++] = filter_input(INPUT_POST,'date_apokthshs');
    }
    ?>

<head>
<title> Search Certificate</title>
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

                    <th>ID</th>
                    <th>Certificate</th>
                    <th>Grade</th>
                    <th>Graduation Date</th> 
<!--                    <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $res = $DB->execute($sql . $w, $a);
                    
                    //-------------Counting results---------//

                    if ($res->rowCount() == 1) {

                        echo "<h4>Found " . $res->rowCount() . " result! </h4>";
                    } else if ($res->rowCount() == 0) {

                        echo "<h4>Didn't find any results! </h4>";
                    } else {
                        echo "<h4>Found " . $res->rowCount() . " results! </h4>";
                    }

                    while ($row = $res->fetch()) {

                        $PtyxioSearch = new Ekpaideysh();
                        $PtyxioSearch->kwd_ptyxio = $row['kwd_ptyxio'];
                        $PtyxioSearch->getDb();
                        
                        
                       
                       
                        echo "<td>" . $PtyxioSearch->kwd_ptyxio . "</td>";
                        echo "<td>" . $PtyxioSearch->per_ptyxiou . "</td>";
                        echo "<td>" . $PtyxioSearch->vathmos . "</td>";
                        echo "<td>" . $PtyxioSearch->date_apokthshs . "</td>";
                        ?>

<!--                        <td class="">
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ptyxia/ViewPtyxio.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewptyxioid" value="<?php echo $PtyxioSearch->kwd_ptyxio; ?>" readonly>
                            <button type="submit" title="View" style="width:120px;height:40px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                            
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ptyxia/EditPtyxio.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="editptyxioid" value="<?php echo $PtyxioSearch->kwd_ptyxio; ?>" readonly>
                            <button type="submit" title="Edit" style="width:120px; height:40px;background-color:green;" class="btn-large">
                                <i>Edit</i></button>
                        </form>
                            
                            
                            
                            
                            
                        <?php
                        if ($_SESSION['user_type_ergazom']==1) { ?>
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Ptyxia/DeletePtyxio.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delptyxioid" value="<?php echo $PtyxioSearch->kwd_ptyxio;?>" readonly>
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

