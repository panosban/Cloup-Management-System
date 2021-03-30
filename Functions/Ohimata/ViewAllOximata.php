<h2 style="color: white">Vehicles</h2>
<?php
session_start();
  require_once '../../Classes/Oxhma.php';
  require_once '../../Classes/Database.php';
?>

<head>
  <title>View Vehicle</title>
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
            background-color: whitesmoke;
            ">
        <thead>
            <tr style="background-color:   #6699ff">

                <th >Plate Number</th>
                <th>Color</th>
                <th>Model</th>
                <th>Brand</th> 
                <th>Driver</th>
              
<!--                <th style="width: 400px">Actions</th>-->
                
            </tr>
        </thead>
        <tbody>
            <tr style="">  
                <?php
                $DB = new Database();
                $DB->connect();
                $res = $DB->execute("SELECT ar_kykloforias, xroma_oxhm, montelo_oxhm, marka_oxhm, odhgos "
                        . "FROM oxhma WHERE ar_kykloforias != -1", []);
                while ($row = $res->fetch()) {
                    echo "<td>" . $row['ar_kykloforias'] . "</td>";
                    echo "<td>" . $row['xroma_oxhm'] . "</td>";
                    echo "<td>" . $row['montelo_oxhm'] . "</td>";
                    echo "<td>" . $row['marka_oxhm'] . "</td>";
                    echo "<td>" . $row['odhgos'] . "</td>";
                    
                    ?>
<!--                    <td class="">
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ohimata/ViewOxima.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="view" value="<?php echo $row['ar_kykloforias']; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                        
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ohimata/DeleteOxima.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="deloximaid" value="<?php echo $row['ar_kykloforias'];?>" readonly>
                            <button type="submit" title="Delete" style="width:120px; background-color:red;" class="btn-large">
                                <i>Delete</i></button>
                        </form>

                    </td>-->

                    <?php
                    echo "</tr>";
                }
                ?>
                <?php
                echo "</tbody></table></div>";



                