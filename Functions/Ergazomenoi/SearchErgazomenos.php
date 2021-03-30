<?php
session_start();
require_once '../../Classes/Ergazomenos.php';
require_once '../../Classes/Database.php';
require_once '../../Classes/Tmhma.php';

if (!isset($_POST['search'])) { ?>

<head>
<title> Search Employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">Search Employee</h1> 
    <form action="" method="post"> 
        <div class="form-group">
                <label for="kwd_ergazomenou">ID </label>
                <input type="text" id="kwd_ergazomenou" name="kwd_ergazomenou" class="form-control">
            </div>  
            <div class="form-group">
                <label for="eponymo">Last Name </label>
                <input type="text" id="eponymo" name="eponymo" class="form-control">
            </div>  
        <div class="form-group">
                <label for="onoma">First Name </label>
                <input type="text" id="onoma" name="onoma" class="form-control">
            </div> 
        <div class="form-group">
                <label for="patronymo">Father's Name </label>
                <input type="text" id="patronymo" name="patronymo" class="form-control">
            </div>  
        <div class="form-group">
                <label for="Fyllo_Ergaz">Gender </label>
                <select type="text" id="Fyllo_Ergaz" name="Fyllo_Ergaz" class="form-control">
                     <option value =null>-</option>
                     <option value ="M">Male</option>
                     <option value ="F">Female</option>
                </select>
            </div> 
         <div class="form-group">
                <label for="AFM_Ergaz">VAT number </label>
                <input type="text" id="AFM_Ergaz" name="AFM_Ergaz" class="form-control">
            </div> 
         <div class="form-group">
                <label for="DOB_Ergazom">DOB </label>
                <input type="date" id="DOB_Ergazom" name="DOB_Ergazom" class="form-control">
            </div> 
        <div class="form-group">
                <label for="Tel_Ergaz">Tel. Number </label>
                <input type="text" id="Tel_Ergaz" name="Tel_Ergaz" class="form-control">
            </div> 
        <div class="form-group">
                <label for="Salary_Ergazom">Salary </label>
                <input type="text" id="Salary_Ergazom" name="Salary_Ergazom" class="form-control">
            </div> 
        <div class="form-group">
                <label for="Kod_tm_ergazom">Department </label>
                <input type="text" id="Kod_tm_ergazom" name="Kod_tm_ergazom" class="form-control">
                  
            </div> 
        
        <div class="form-group">
                <label for="alias">Username </label>
                <input type="text" id="alias" name="alias" class="form-control">
            </div> 
         <div class="form-group">
                <label for="user_type_ergazom">Rights </label>
                <input type="text" id="user_type_ergazom" name="user_type_ergazom" class="form-control">
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
    $sql = " SELECT `kwd_ergazomenou`, `Eponymo_ergazom`, `Onoma_Ergazom`, "
            . "`Patronymo_Ergazom`, `Fyllo_Ergaz`, `AFM_Ergaz`, `DOB_Ergazom`, "
            . "`Tel_Ergaz`, `Salary_Ergazom`, `Kod_tm_ergazom`, `user_type_ergazom`, "
            . "`alias` FROM `ergazomenos`  ";
    $w = "where ?";

    $i = 0;
    $a = [];
    $a[$i++] = "1";


   if ($_POST['eponymo'] !== "") {
        $w = $w . " and Eponymo_ergazom like ? ";
        $a[$i++] = "%" . $_POST['eponymo'] . "%";
    }

    if ($_POST['kwd_ergazomenou'] !== "") {
        $w = $w . " and kwd_ergazomenou = ? ";
        $a[$i++] = $_POST['kwd_ergazomenou'] ;
    }
    if ($_POST['onoma'] !== "") {
        $w = $w . " and Onoma_Ergazom like ? ";
        $a[$i++] = "%" . $_POST['onoma'] . "%";
    }
    if ($_POST['patronymo'] !== "") {
        $w = $w . " and Patronymo_Ergazom like ? ";
        $a[$i++] = "%" . $_POST['patronymo'] . "%";
    }
  

    if ($_POST['Fyllo_Ergaz'] !== "null") {
        $w = $w . " and Fyllo_Ergaz = ? ";
        $a[$i++] = $_POST['Fyllo_Ergaz'];
    }

    if ($_POST['AFM_Ergaz'] !== "") {
        $w = $w . " and AFM_Ergaz = ? ";
        $a[$i++] =$_POST['AFM_Ergaz'];
    }
    if ($_POST['DOB_Ergazom'] !== "") {
        $w = $w . " and DOB_Ergazom = ? ";
        $a[$i++] = $_POST['DOB_Ergazom'];
    }
    if ($_POST['Tel_Ergaz'] !== "") {
        $w = $w . " and Tel_Ergaz like ? ";
        $a[$i++] = $_POST['Tel_Ergaz'] . "%";
    }
    if ($_POST['Salary_Ergazom'] !== "") {
        $w = $w . " and Salary_Ergazom = ? ";
        $a[$i++] = $_POST['Salary_Ergazom'];
    }
    if ($_POST['Kod_tm_ergazom'] !== "") {
        $w = $w . " and Kod_tm_ergazom = ? ";
        $a[$i++] = $_POST['Kod_tm_ergazom'];
    }
     if ($_POST['user_type_ergazom'] !== "") {
        $w = $w . " and user_type_ergazom = ? ";
        $a[$i++] = $_POST['user_type_ergazom'] . "%";
    }
    
    if ($_POST['alias'] !== "") {
        $w = $w . " and alias like ? ";
        $a[$i++] = $_POST['alias'] . "%";
    }
    ?>

<head>
<title> Search Employee</title>
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
                <tr style="background-color:   #6699ff">

                    <th style=white-space:nowrap">ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
<!--                    <th>Τμήμα</th> -->
                    <th>Username</th>
                    <th>DOB</th>
<!--                    <th>Δικαιώματα στην Εφαρμογή</th>-->
                    <th>Father's Name</th>
                    <th>VAT Number</th>
                    <th>Tel. Number</th>
                    <th>Salary</th>
<!--                    <th style="width: 600px">Actions</th>-->


                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $res = $DB->execute($sql . $w, $a);
                    //echo $sql . $w, $a;
                    //-------------Μέτρηση αποτελεσμάτων εγγραφών---------//

                    if ($res->rowCount() == 1) {

                        echo "<h4>Found " . $res->rowCount() . " result! </h4>";
                    } else if ($res->rowCount() == 0) {

                        echo "<h4>Didn't find results! </h4>";
                    } else {
                        echo "<h4>Found " . $res->rowCount() . " results! </h4>";
                    }

                    while ($row = $res->fetch()) {

                        $ErgSearch = new Ergazomenos();
                        $ErgSearch->kwd_ergazomenou = $row['kwd_ergazomenou'];
                        $ErgSearch->Eponymo_ergazom = $row['Eponymo_ergazom'];
                        $ErgSearch->Onoma_Ergazom = $row['Onoma_Ergazom'];
                        $ErgSearch->Kod_tm_ergazom = $row['Kod_tm_ergazom'];
                        $ErgSearch->alias = $row['alias'];
                        $ErgSearch->DOB_Ergazom = $row['DOB_Ergazom'];
                        $ErgSearch->user_type_ergazom = $row['user_type_ergazom'];
                        $ErgSearch->Patronymo_Ergazom = $row['Patronymo_Ergazom'];
                        $ErgSearch->AFM_Ergaz = $row['AFM_Ergaz'];
                        $ErgSearch->Tel_Ergaz = $row['Tel_Ergaz'];
                        $ErgSearch->Salary_Ergazom = $row['Salary_Ergazom'];
                        
//                        //Για να μου εμφανίζει το όνομα τμήματος
//                        $TmhmaSearch=new Tmhma();
//                        $TmhmaSearch->kwd_tmhmatos=$ErgSearch->Kod_tm_ergazom;
//                        $TmhmaSearch->getDB(); //Δεν έχει φτιαχτεί.
//                        
//                        //Για να μου εμφανίζει το User_type.
//                        
//                        $UsertypeSearch=new User_type();
//                        $UsertypeSearch->user_type_id=$ErgSearch->user_type_ergazom;
//                        $UsertypeSearch->getDB(); //Δεν έχει φτιαχτεί.
                        
                        
                       
                        echo "<td>" . $row['kwd_ergazomenou'] . "</td>";
                        echo "<td>" . $row['Eponymo_ergazom'] . "</td>";
                        echo "<td>" . $row['Onoma_Ergazom'] . "</td>";
                        //echo "<td>" . $TmhmaSearch->onoma_tmhmatos . "</td>";
                        echo "<td>" . $row['alias'] . "</td>";
                        echo "<td>" . $row['DOB_Ergazom'] . "</td>";
                        //echo "<td>" . $UsertypeSearch->user_type_name . "</td>";
                        echo "<td>" . $row['Patronymo_Ergazom'] . "</td>";
                        echo "<td>" . $row['AFM_Ergaz'] . "</td>";
                        echo "<td>" . $row['Tel_Ergaz'] . "</td>";
                        echo "<td>" . $row['Salary_Ergazom'] . "</td>";
                        ?>

<!--                        <td class="">
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ergazomenoi/ViewErgazomenos.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="viewergazid" value="<?php echo $ErgSearch->kwd_ergazomenou; ?>" readonly>
                            <button type="submit" title="View" style="width:120px; background-color:blue;" class="btn-large">
                                <i>View</i></button>
                        </form>
                        
                        <form style ="float: left; padding: 2px; width: 160px; height: 50px;" method="post" action="../../Functions/Ergazomenoi/DeleteErgazomenos.php" target="_blank">
                            <input style=" display:none ;color: red; width: 0px; height: 0px;" 
                                   type="text" name="delergazid" value="<?php echo $ErgSearch->kwd_ergazomenou;?>" readonly>
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
                }

