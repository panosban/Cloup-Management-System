<?php
session_start();
  require_once '../../Classes/Oxhma.php';
  require_once '../../Classes/Database.php';
?>
<head>
  <title>View Vehicle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">View Vehicle</h1>
    <form action="" method="post">
        

<?php
$oxima= new Oxhma();
$oxima->ar_kykloforias=filter_input(INPUT_POST,'viewoximaid');
$oxima->getDb();


echo "Plate Number :".$oxima->ar_kykloforias;
echo '</br>';
echo "Color:".$oxima->xroma_oxhm;
echo '</br>';
echo "Model:".$oxima->montelo_oxhm;
echo '</br>';
echo "Brand:".$oxima->marka_oxhm;
echo '</br>';
echo "Driver:".$oxima->odhgos;

