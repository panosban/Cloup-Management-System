<h2 style="color: white">View Employees</h2>
<?php
session_start();
  require_once '../../Classes/Ergazomenos.php';
  require_once '../../Classes/Database.php';
?>

  <title>View Employees</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Father's Name</th> 
                <th>Gender</th>
                <th>VAT Number</th>
                <th>DOB</th> 
                <th>Tel. Number</th>
                <th>Salary</th>
                <th>Department</th> 
                <th>User Type</th>
                <th>Username</th>
              
                <th style="width: 250px">Actions</th>

            </tr>
        </thead>
        <tbody>
            <tr style="">
                <?php
                $DB = new Database();
                $DB->connect();
                $res = $DB->execute("SELECT `kwd_ergazomenou`, `Eponymo_ergazom`, `Onoma_Ergazom`, `Patronymo_Ergazom`, `Fyllo_Ergaz`, `AFM_Ergaz`, "
                        . "`DOB_Ergazom`, `Tel_Ergaz`, `Salary_Ergazom`, `Kod_tm_ergazom`, `user_type_ergazom`, `alias`"
                        . "FROM `ergazomenos` WHERE kwd_ergazomenou != 0 ;", []);
                while ($row = $res->fetch()) {
                    echo "<td>" . $row['kwd_ergazomenou'] . "</td>";
                    echo "<td>" . $row['Eponymo_ergazom'] . "</td>";
                    echo "<td>" . $row['Onoma_Ergazom'] . "</td>";
                    echo "<td>" . $row['Patronymo_Ergazom'] . "</td>";
                    echo "<td>" . $row['Fyllo_Ergaz'] . "</td>";
                    echo "<td>" . $row['AFM_Ergaz'] . "</td>";
                    echo "<td>" . $row['DOB_Ergazom'] . "</td>";
                    echo "<td>" . $row['Tel_Ergaz'] . "</td>";
                    echo "<td>" . $row['Salary_Ergazom'] . "</td>";
                    $tmhma = $DB->getTmhmaErgaz($row['kwd_ergazomenou']);
                    echo "<td>" . $tmhma . "</td>";
                    echo "<td>" . $row['user_type_ergazom'] . "</td>";
                    echo "<td>" . $row['alias'] . "</td>";
                    
                    
                    
                    ?>
                    <td class="">
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ergazomenoi/ViewErgazomenos.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewergid" value="<?php echo $row['kwd_ergazomenou']; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                        
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ergazomenoi/DeleteErgazomenos.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delergid" value="<?php echo $row['kwd_ergazomenou'];?>" readonly>
                            <button type="submit" title="Delete" style="width:120px; background-color:red;" class="btn-large">
                                <i>Delete</i></button>
                        </form>
                        
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ergazomenoi/EditErgazomeno.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="editergazid" value="<?php echo $row['kwd_ergazomenou'];?>" readonly>
                            <button type="submit" title="Edit" style="width:120px; background-color:green;" class="btn-large">
                                <i>Edit</i></button>
                        </form>

                    </td>

                    <?php
                    echo "</tr>";
                }//Τέλος εκτύπωσης γραμμής
                ?>
                <?php
                echo "</tbody></table></div>";



                