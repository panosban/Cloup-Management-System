<?php
session_start();
  require_once '../../Classes/Ekpaideysh.php';
  require_once '../../Classes/Database.php';
?>

<head>
  <title>View Certificate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">View Certificate</h1>
    <form action="" method="post">
    
<?php
$ekpaideysh= new Ekpaideysh();
$ekpaideysh->kwd_ptyxio = filter_input(INPUT_POST,'viewptyxioid');
$ekpaideysh->getDb();

echo "Certificate ID:".$ekpaideysh->kwd_ptyxio;
echo '</br>';
echo "Description:".$ekpaideysh->per_ptyxiou;
echo '</br>';
echo "Grade:".$ekpaideysh->vathmos;
echo '</br>';
echo "Graduation Date:".$ekpaideysh->date_apokthshs;
echo '</br>';

