<?php
session_start();
  require_once '../../Classes/Oxhma.php';
  require_once '../../Classes/Database.php';
 
$oxima= new Oxhma();
$oxima->ar_kykloforias =filter_input(INPUT_POST,'deloximaid');


if (!isset($_POST['delbutton'])){
    
    echo 'Vehicle will be deleted!';
    $delcode=$oxima->ar_kykloforias;
    ?>
<form action="" method="post">
    <input type="hidden" name="delcode" value="<?php echo $delcode; ?>" >
<button style="float: left" type="submit" name="delbutton" id="delbutton" onclick="return confirm('Confirm Deletion')" value="Διαγραφή" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span> Delete Vehicle</button>
</form>     
    
<?php
}

else { 
$delcode=filter_input(INPUT_POST,'delcode');
$DB=new Database();
$DB->connect();
$sql = "DELETE FROM `oxhma` WHERE `ar_kykloforias`= ?";
        $DB->execute($sql, [$delcode]);
?>
<script>alert('Vehicle Deleted!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }