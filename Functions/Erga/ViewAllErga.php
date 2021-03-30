<h2 style=" color: white">Projects</h2>
<?php
session_start();
  require_once '../../Classes/Ergo.php';
  require_once '../../Classes/Database.php';
?>
<!DOCTYPE html>
<head>
  <title>Projects</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div><table class="table table-responsive table-bordered table-condensed"
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
            <tr style="background-color:   #6699ff">

                <th style=white-space:nowrap">ID</th>
                <th>Description</th>
                <th>Entry Date</th>
                <th>Closing Date</th> 
              
                <th style="width: 600px">Actions</th>

            </tr>
        </thead>
        <tbody>
            <tr style="">
                <?php
                $DB = new Database();
                $DB->connect();
                $res = $DB->execute("SELECT `kwd_ergou`, `perigrafh_ergou`, `finish_date`, `start_date` FROM `ergo` where kwd_ergou !=0 ", []);
                while ($row = $res->fetch()) {
                    echo "<td>" . $row['kwd_ergou'] . "</td>";
                    echo "<td>" . $row['perigrafh_ergou'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['finish_date'] . "</td>";
                    
                    ?>
                    <td class="">
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Erga/ViewErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewergoid" value="<?php echo $row['kwd_ergou']; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                        
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Erga/EditErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="editergoid" value="<?php echo $row['kwd_ergou'];?>" readonly>
                            <button type="submit" title="Edit" style="width:120px;background-color:green;" class="btn-large">
                                <i>Edit</i></button>
                        </form>
                        
                        <?php
                        if ($_SESSION['user_type_ergazom']==1) { ?>
                            <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Erga/DeleteErgo.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delergoid" value="<?php echo $row['kwd_ergou'];?>" readonly>
                            <button type="submit" title="Delete" style="width:120px; background-color:red;" class="btn-large">
                                <i>Delete</i></button>
                        </form> <?php } ?>                        
        
                    </td>

                    <?php
                    echo "</tr>";
                }
                ?>
                <?php
                echo "</tbody></table></div>";



                