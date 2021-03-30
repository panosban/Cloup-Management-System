<?php
session_start();
  require_once '../../Classes/Tmhma.php';
  require_once '../../Classes/Database.php';
 
$tmhma= new Tmhma();
$tmhma->kwd_tmhmatos=filter_input(INPUT_POST,'deltmhmaid');


if (!filter_input(INPUT_POST,'delbutton')){
    
    echo 'Department will be deleted!';
    $delcode=$tmhma->kwd_tmhmatos;
    ?>
<form action="" method="post">
    <input type="hidden" name="delcode" value="<?php echo $delcode; ?>" >
<button style="float: left" type="submit" name="delbutton" id="delbutton" onclick="return confirm('Confirm deletion')" value="Διαγραφή" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span> Delete Department</button>
</form>     
    
<?php
}

else { //Confirm button is selected!
$delcode=filter_input(INPUT_POST,'delcode');
$DB=new Database();
$DB->connect();
$sql = "DELETE FROM `tmhma` WHERE `kwd_tmhmatos`= ?";
        $DB->execute($sql, [$delcode]);
        ?>
<script>alert('Department Deleted!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }
















       