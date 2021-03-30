<?php
session_start();
  require_once '../../Classes/Ergazomenos.php';
  require_once '../../Classes/Database.php';
 
$ergazomenos= new Ergazomenos();
$ergazomenos->kwd_ergazomenou = filter_input(INPUT_POST,'delergid');


if (!filter_input(INPUT_POST,'delbutton')){
    
    echo 'Employee will be deleted!';
    $delcode = $ergazomenos->kwd_ergazomenou;
    ?>
<form action="" method="post">
    <input type="hidden" name="delcode" value="<?php echo $delcode; ?>" >
<button style="float: left" type="submit" name="delbutton" id="delbutton" onclick="return confirm('Confirm deletion')" value="Διαγραφή" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span> Delete Employee</button>
</form>     
    
<?php
}

else { //Confirm button is selected!
$delcode=filter_input(INPUT_POST,'delcode');
$DB=new Database();
$DB->connect();
$sql = "DELETE FROM `ergazomenos` WHERE `kwd_ergazomenou`= ?";
        $DB->execute($sql, [$delcode]);
        ?>
<script>alert('Employee Deleted!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

















       