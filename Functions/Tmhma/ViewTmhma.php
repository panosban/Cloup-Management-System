<?php
session_start();
  require_once '../../Classes/Tmhma.php';
  require_once '../../Classes/Database.php';
?>
<head>
  <title>View Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">View Department</h1>
    <form action="" method="post">
        

<?php
$tmhma= new Tmhma();
$tmhma->kwd_tmhmatos= filter_input(INPUT_POST, 'viewtmhmaid');
$tmhma->getDb();

echo "Department ID: ".$tmhma->kwd_tmhmatos;
echo '</br>';
echo "Department: ".$tmhma->onoma_tmhmatos;
echo '</br>';
echo "Supervisor ID: ".$tmhma->kwd_proistamenou;

