<?php
//ΔΕΝ ΕΙΝΑΙ ΤΕΛΕΙΩΜΕΝΟ

session_start();

require_once '../../Classes/Ergazomenos.php';
require_once '../../Classes/Database.php';

if ((filter_input(INPUT_POST,'editergazid')) && (!filter_input(INPUT_POST,'editergazid2'))) {
    $editergazom=new Ergazomenos();
    $editergazom->kwd_ergazomenou= filter_input(INPUT_POST,'editergazid');
    $editergazom->getDb();
    
    ?>
<head>
  <title>Edit Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
            <h1 class="form-header">Edit Employee</h1>
            <form action="" method="post"
        <div id="SearchPart" class="col-lg-12">

            


            <div class="form-group">
                <label for="editergazid2">ID</label>
                <input type="text" id="editergazid2" name="editergazid2" value="<?php echo filter_input(INPUT_POST,'editergazid'); ?>" required class="form-control">
            </div>  
            <div class="form-group">
                <label for="Eponymo_ergazom">Last Name</label>
                <input type="text" id="Eponymo_ergazom" name="Eponymo_ergazom" value="<?php echo $editergazom->Eponymo_ergazom; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Onoma_Ergazom">First Name</label>
                <input type="text" id="Onoma_Ergazom" name="Onoma_Ergazom" value="<?php echo $editergazom->Onoma_Ergazom; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Patronymo_Ergazom">Father's Name</label>
                <input type="text" id="Patronymo_Ergazom" name="Patronymo_Ergazom" value="<?php echo $editergazom->Patronymo_Ergazom; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="Fyllo_Ergaz">Gender</label>
                <input type="text" id="Fyllo_Ergaz" name="Fyllo_Ergaz" value="<?php echo $editergazom->Fyllo_Ergaz; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="AFM_Ergaz">VAT number</label>
                <input type="text" id="AFM_Ergaz" name="AFM_Ergaz" value="<?php echo $editergazom->AFM_Ergaz; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="DOB_Ergazom">DOB</label>
                <input type="date" id="DOB_Ergazom" name="DOB_Ergazom" value="<?php echo $editergazom->DOB_Ergazom; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="Tel_Ergaz">Tel. Number</label>
                <input type="text" id="Tel_Ergaz" name="Tel_Ergaz" value="<?php echo $editergazom->Tel_Ergaz; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="Salary_Ergazom">Salary</label>
                <input type="text" id="Salary_Ergazom" name="Salary_Ergazom" value="<?php echo $editergazom->Salary_Ergazom; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="Kod_tm_ergazom">Department</label>
                <input type="text" id="Kod_tm_ergazom" name="Kod_tm_ergazom" value="<?php echo $editergazom->Kod_tm_ergazom; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="user_type_ergazom">User Type</label>
                <input type="text" id="user_type_ergazom" name="user_type_ergazom" value="<?php echo $editergazom->user_type_ergazom; ?>"  class="form-control" required>
            </div>
                        <div class="form-group">
                <label for="alias">Username</label>
                <input type="text" id="alias" name="alias" value="<?php echo $editergazom->alias; ?>"  class="form-control" required>
            </div>


            <button style="float: left" type="submit" name="EditErgazomeno" id="EditErgazomeno" value="Ενημέρωση" class="btn btn-info "><span class="glyphicon glyphicon-retweet"></span> Update</button>
            <button style="float: left ; color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>

    </form>
    </div>

    <?php
} else {
    
    $editergazomfinal= new Ergazomenos();
    $editergazomfinal->kwd_ergazomenou=filter_input(INPUT_POST,'editergazid2');
    $editergazomfinal->Eponymo_ergazom=filter_input(INPUT_POST,'Eponymo_ergazom');
    $editergazomfinal->Onoma_Ergazom=filter_input(INPUT_POST,'Onoma_Ergazom');
    $editergazomfinal->Patronymo_Ergazom=filter_input(INPUT_POST,'Patronymo_Ergazom');
    $editergazomfinal->Fyllo_Ergaz=filter_input(INPUT_POST,'Fyllo_Ergaz');
    $editergazomfinal->AFM_Ergaz=filter_input(INPUT_POST,'AFM_Ergaz');
    $editergazomfinal->DOB_Ergazom=filter_input(INPUT_POST,'DOB_Ergazom');
    $editergazomfinal->Tel_Ergaz=filter_input(INPUT_POST,'Tel_Ergaz');
    $editergazomfinal->Salary_Ergazom=filter_input(INPUT_POST,'Salary_Ergazom');
    $editergazomfinal->Kod_tm_ergazom=filter_input(INPUT_POST,'Kod_tm_ergazom');
    $editergazomfinal->alias=filter_input(INPUT_POST,'alias');
    $editergazomfinal->user_type_ergazom=filter_input(INPUT_POST,'user_type_ergazom');
    $editergazomfinal->updateDb();
    
}