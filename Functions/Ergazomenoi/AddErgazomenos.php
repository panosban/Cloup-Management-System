<?php
session_start();
require_once '../../Classes/Ergazomenos.php';
require_once '../../Classes/Database.php';



if (!isset($_POST['AddUser'])) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



  
</head>
<body>
    <h1 class="form-header">Add Employee: </h1> 
    <form action="" method="post">     
            <div class="form-group">
                <label for="eponymo">Last Name: </label>
                <input type="text" id="eponymo" name="eponymo" required class="form-control">
            </div>  
        <div class="form-group">
                <label for="onoma">Name: </label>
                <input type="text" id="onoma" name="onoma" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="patronymo">Father's Name: </label>
                <input type="text" id="patronymo" name="patronymo" required class="form-control">
            </div>  
        <div class="form-group">
                <label for="Fyllo_Ergaz">Gender: </label>
                <select type="text" id="Fyllo_Ergaz" name="Fyllo_Ergaz" required class="form-control">
                    <option value ="M">Male</option>
                    <option value ="F">Female</option>
                </select>
            </div> 
         <div class="form-group">
                <label for="AFM_Ergaz">VAT Number: </label>
                <input type="text" id="AFM_Ergaz" name="AFM_Ergaz" required class="form-control">
            </div> 
         <div class="form-group">
                <label for="DOB_Ergazom">Date Of Birth: </label>
                <input type="date" id="DOB_Ergazom" name="DOB_Ergazom" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="Tel_Ergaz">Tel. Number: </label>
                <input type="text" id="Tel_Ergaz" name="Tel_Ergaz" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="Salary_Ergazom">Salary: </label>
                <input type="text" id="Salary_Ergazom" name="Salary_Ergazom" required class="form-control">
            </div> 
        <div class="form-group">
                <label for="Kod_tm_ergazom">Department: </label>
 
                    <select id="Kod_tm_ergazom" name="Kod_tm_ergazom" class="form-control">
                        <option value="NULL"> - </option>
                        <?php 
                  
                            $DB = new Database();
                            $DB->connect();
                            $sql = "SELECT `kwd_tmhmatos`, `onoma_tmhmatos` FROM `tmhma`;";
                            $res = $DB->execute($sql,[]);
                            echo $res->rowCount() ;
                            if ($res->rowCount() != 0) {
                                while($row = $res->fetch())
              {
                             
                                    echo "<option value='".$row['kwd_tmhmatos']."'>".$row['kwd_tmhmatos']. " - ".$row['onoma_tmhmatos']."</option>";
                                }
                                }
                        
                        ?>
                    </select>
            </div> 
         <div class="form-group">
                <label for="user_type_ergazom">Rights: </label>
                <select type="text" id="user_type_ergazom" name="user_type_ergazom" required class="form-control">
                    <?php
                            $DB = new Database();
                            $DB->connect();
                            $sql = "SELECT `user_type_id`, `user_type_name` FROM `user_type` ;";
                            $res = $DB->execute($sql,[]);
                            echo $res->rowCount() ;
                            if ($res->rowCount() != 0) {
                                while($row = $res->fetch()){
                             
                                    echo "<option value='".$row['user_type_id'].
                                            "'>".$row['user_type_id']. " - ".$row['user_type_name']."</option>";
                                }
                                }
                        ?>
                </select>
            </div> 
        <div class="form-group">
                <label for="alias">Username: </label>
                <input type="text" id="alias" name="alias" required class="form-control">
            </div> 
         <div class="form-group">
                <label for="crypto">Password: </label>
                <input type="password" id="crypto" name="crypto" required class="form-control">
            </div> 
        
            <div class="clear-float"></div>
            <button style="float: left" type="submit" name="AddUser" id="AddUser" value="Προσθήκη" class="btn btn-info "><span class="glyphicon glyphicon-plus-sign"></span> Register</button>
            <button style="float: left;color: #ff6666" type="button" name="cancel" id="cancel" value="Ακύρωση" onclick="window.location = '../../LoggedInPage.php';" class="btn btn-info "><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            <br><br>
        </form>
    </div>
</body>
    
    
    
    
    
<?php 

                    }
                    else { //When Register button is selected!
                        $worker=new Ergazomenos();
                        $worker->AFM_Ergaz=filter_input(INPUT_POST,"AFM_Ergaz");
                        $worker->DOB_Ergazom=filter_input(INPUT_POST,"DOB_Ergazom");
                        $worker->Eponymo_ergazom=filter_input(INPUT_POST,"eponymo");
                        $worker->Fyllo_Ergaz=filter_input(INPUT_POST,"Fyllo_Ergaz");
                        $worker->Kod_tm_ergazom=filter_input(INPUT_POST,"Kod_tm_ergazom");
                        $worker->Onoma_Ergazom=filter_input(INPUT_POST,"onoma");
                        $worker->Patronymo_Ergazom=filter_input(INPUT_POST,"patronymo");
                        $worker->Salary_Ergazom=filter_input(INPUT_POST,"Salary_Ergazom");
                        $worker->Tel_Ergaz=filter_input(INPUT_POST,"Tel_Ergaz");
                        $worker->alias=filter_input(INPUT_POST,"alias");
                        $worker->crypto=filter_input(INPUT_POST,"crypto");
                        $worker->user_type_ergazom=filter_input(INPUT_POST,"user_type_ergazom");
                        $worker->setDb();
                    

                    
?>
<script>alert('Employee Added!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }
                
       
