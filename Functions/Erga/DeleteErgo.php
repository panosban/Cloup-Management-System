<?php
session_start();
  require_once '../../Classes/Ergo.php';
  require_once '../../Classes/Database.php';
 
$ergo= new Ergo();
$ergo->kwd_ergou=filter_input(INPUT_POST,'delergoid');


if (!filter_input(INPUT_POST,'delbutton')){
    
    echo 'Project will be deleted!';
    $delcode=$ergo->kwd_ergou;
    ?>
<form action="" method="post">
    <input type="hidden" name="delcode" value="<?php echo $delcode; ?>" >
<button style="float: left" type="submit" name="delbutton" id="delbutton" onclick="return confirm('Confirm deletion')" value="Διαγραφή" class="btn btn-info "><span class="glyphicon glyphicon-trash"></span> Delete Project</button>
</form>     
    
<?php
}

else { //Confirm button is selected!
$delcode=filter_input(INPUT_POST,'delcode');
$DB=new Database();
$DB->connect();
$sql = "DELETE FROM `ergo` WHERE `kwd_ergou`= ?";
        $DB->execute($sql, [$delcode]);
        ?>
<script>alert('Project Deleted!');</script>
<script> location.replace("../../LoggedInPage.php"); </script><?php
                    
                    }
















       