<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
  <link rel = "icon" href = "img/logo_cloup.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/LoggedInPage.css">

</head>
<body>

<div class="container">
  <ul>
    
    <?php
    if ($_SESSION['user_type_ergazom']==1) {
    
    ?>
    <li><a href="#">Employees</a>
      <ul>
        <li><a href="Functions/Ergazomenoi/AddErgazomenos.php">Add Employee</a></li>
        <li><a href="Functions/ExartomenaMeloi/AddExartomenoMelos.php">Add Dependent Member </a></li>
        <li><a href="Functions/Ergazomenoi/SearchErgazomenos.php">Search Employee</a></li>
        <li><a href="Functions/Ergazomenoi/ViewAllErgazomenoi.php">View All</a></li>
      </ul>
    </li>
    <?php
    }
    ?>   
    
    <li>
      <a href="#">Projects</a>
      <ul>
        <li><a href="Functions/Erga/AddErgo.php">Add Project</a></li>
	<li><a href="Functions/Erga/SearchErgo.php">Search Project</a></li> 
        <li><a href="Functions/Erga/ViewAllErga.php">View All</a></li>            
      </ul>
    </li>
    <li>
      <a href="#">Departments</a>
      <ul>
        <li><a href="Functions/Tmhma/AddTmhma.php">Add Department</a></li>
        <li><a href="Functions/Tmhma/SearchTmhma.php">Search Department</a></li> 
        <li><a href="Functions/Tmhma/ViewAllTmhmata.php">View All</a></li>                 
      </ul>
    </li>
    <li>
      <a href="#">Vehicles</a>
      <ul>
        <li><a href="Functions/Ohimata/AddOhima.php">Add Vehicle</a></li>
        <li><a href="Functions/Ohimata/SearchOxima.php">Search Vehicles</a></li>
        <li><a href="Functions/Ohimata/ViewAllOximata.php">View All</a></li>                        
      </ul>
    </li>
        <li>
      <a href="#">Certificates</a>
      <ul>
        <li><a href="Functions/Ptyxia/AddPtyxio.php">Add Certificate</a></li>
	<li><a href="Functions/Ptyxia/SearchPtyxio.php">Search Certificate</a></li> 
        <li><a href="Functions/Ptyxia/ViewAllPtyxia.php">View All</a></li>                      
      </ul>
    </li>
	<li><a href="logout.php" target="_blank">Logout</a></li>
    
  </ul>
</div>
    


</body>
</html>
