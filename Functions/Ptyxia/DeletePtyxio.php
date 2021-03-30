<?php
session_start();
  require_once '../../Classes/Ekpaideysh.php';
  require_once '../../Classes/Database.php';
 
$ekpaideysh= new Ekpaideysh();
$ekpaideysh->kwd_ptyxio=filter_input(INPUT_POST,'delptyxioid');


if (!filter_input(INPUT_POST,'delbutton')){
    
    echo 'Certificate will be deleted!';
    $delcode=$ekpaideysh->kwd_ptyxio;
    ?>
<form action="" method="post">
    <input type="hidden" name="delcode" value="<?php echo $delcode; ?>" >
<button style="float: left" type="submit" name="delbutton" id="delbutton" onclick="return confirm('Confirm deletion')" value="Διαγραφή" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span> Delete Certificate</button>
</form>     
    
<?php
}

else { //Confirm button is selected!
$delcode=filter_input(INPUT_POST,'delcode');
$DB=new Database();
$DB->connect();
$sql = "DELETE FROM `ekpaideysh` WHERE `kwd_ptyxio`= ?";
        $DB->execute($sql, [$delcode]);
        echo 'Deleted Successfully!';
        ?>
<script>alert('Certificate Deleted!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }

















       