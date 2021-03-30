<?php
session_start();

require_once '../../Classes/Ergo.php';
require_once '../../Classes/Database.php';
require_once '../../Classes/Tmhma.php';

if (!isset($_POST['search'])) { ?>

<title>Search Project</title>
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h1 class="form-header">Search Project</h1> 
    <form action="" method="post"> 
        <div class="form-group">
                <label for="kwd_ergou">Project ID </label>
                <input type="text" id="kwd_ergou" name="kwd_ergou" class="form-control">
            </div>  
            <div class="form-group">
                <label for="perigrafh_ergou">Description</label>
                <input type="text" id="perigrafh_ergou" name="perigrafh_ergou" class="form-control">
            </div>  
        <div class="form-group">
                <label for="start_date">Entry Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div> 
        <div class="form-group">
                <label for="finish_date">Closing Date </label>
                <input type="date" id="finish_date" name="finish_date" class="form-control">
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
    $sql = " SELECT `kwd_ergou`, `perigrafh_ergou`, start_date, finish_date FROM `ergo`";
    $w = "where ?";

    $i = 0;
    $a = [];
    $a[$i++] = "1";


   if ($_POST['kwd_ergou'] !== "") {
        $w = $w . " and kwd_ergou = ? ";
        $a[$i++] = $_POST['kwd_ergou'];
    }

    if ($_POST['perigrafh_ergou'] !== "") {
        $w = $w . " and perigrafh_ergou LIKE ? ";
        $a[$i++] ="%" . $_POST['perigrafh_ergou']. "%" ;
    }
   
    if ($_POST['start_date'] != "") {
        $w = $w . " and start_date >= str_to_date(?,'%Y-%m-%d') ";
        $a[$i++] = $_POST['start_date'];
    } else {
        $w = $w . " and start_date > str_to_date('1300-01-01','%Y-%m-%d') ";
    }
    
    if ($_POST['finish_date'] != "") {
        $w = $w . " and finish_date <= str_to_date(?,'%Y-%m-%d') ";
        $a[$i++] = $_POST['finish_date'];
    } else {
        $w = $w . " and finish_date < str_to_date('3020-12-31','%Y-%m-%d') ";
    }
    ?>

<head>
<title> Search Project</title>
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

                    <th>Project ID</th>
                    <th>Description</th>
                    <th>Entry Date</th>
                    <th>Closing Date  </th> 
<!--                    <th>Actions</th> -->
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

                        $ErgοSearch = new Ergo();
                        $ErgοSearch->kwd_ergou = $row['kwd_ergou'];
                        $ErgοSearch->getDb();
                        
                        
                       
                       
                        echo "<td>" . $ErgοSearch->kwd_ergou . "</td>";
                        echo "<td>" . $ErgοSearch->perigrafh_ergou . "</td>";
                        echo "<td>" . $ErgοSearch->start_date . "</td>";
                        echo "<td>" . $ErgοSearch->finish_date . "</td>";
                        ?>

<!--                        <td class="">
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Erga/ViewErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewergoid" value="<?php echo $ErgοSearch->kwd_ergou; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; height:40px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                            
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Erga/EditErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="editergoid" value="<?php echo $ErgοSearch->kwd_ergou; ?>" readonly>
                            <button type="submit" title="Edit" style="width:120px; height:40px; background-color:green;" class="btn-large">
                                <i>Edit</i></button>
                        </form>
                            
                            
                            
                            
                            
                        <?php
                        if ($_SESSION['user_type_ergazom']==1) { ?>
                            <form style ="float: left; padding: 2px; width: 160px; height: 60px;" method="post" action="../../Functions/Erga/DeleteErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delergoid" value="<?php echo $ErgοSearch->kwd_ergou;?>" readonly>
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

