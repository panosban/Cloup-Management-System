<?php
session_start();
  require_once '../../Classes/Ergazomenos.php';
  require_once '../../Classes/Database.php';
  ?>

<head>
  <title>View Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">View Employee</h1>
<form action="" method="post">
<?php  
$DB = new Database();
$ergazomenos= new Ergazomenos();
$ergazomenos->kwd_ergazomenou = filter_input(INPUT_POST,'viewergid');
$ergazomenos->getDb();
                    
echo "ID: ".$ergazomenos->kwd_ergazomenou;
echo '</br>';
echo "Last Name: ".$ergazomenos->Eponymo_ergazom;
echo '</br>';
echo "First Name: ".$ergazomenos->Onoma_Ergazom;
echo '</br>';
echo "Father's Name: ".$ergazomenos->Patronymo_Ergazom;
echo '</br>';
echo "Gender: ".$ergazomenos->Fyllo_Ergaz;
echo '</br>';
echo "VAT Number: ".$ergazomenos->AFM_Ergaz;
echo '</br>';
echo "DOB: ".$ergazomenos->DOB_Ergazom;
echo '</br>';
echo "Salary: ".$ergazomenos->Salary_Ergazom;
echo '</br>';
$tmhma = $DB->getTmhmaErgaz($ergazomenos->kwd_ergazomenou);
echo "Department: ".$tmhma;
echo '</br>';
echo "User Type: ".$ergazomenos->user_type_ergazom;
echo '</br>';
$eksartomenoi = $DB->getAllEksart($ergazomenos->kwd_ergazomenou);
echo "Dependent Members : ";
echo '</br>';
foreach($eksartomenoi as $eksartomenos){
    echo $eksartomenos['Onoma_eksart']." ".$eksartomenos['Eponymo_eksart']." ".$eksartomenos['AMKA_eksart'];
}

