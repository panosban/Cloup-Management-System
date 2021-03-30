<?php
session_start();
  require_once '../../Classes/Ergo.php';
  require_once '../../Classes/Database.php';
?>
<head>
  <title>View Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<h1 class="form-header">View Project</h1>
    <form action="" method="post">
        

<?php
$ergo= new Ergo();
$ergo->kwd_ergou = filter_input(INPUT_POST, 'viewergoid');
$ergo->getDb();

echo "Project ID: ".$ergo->kwd_ergou;
echo '</br>';
echo 'Description: '.$ergo->perigrafh_ergou;
echo '</br>';
echo "Entry Date: ".$ergo->start_date;
echo '</br>';
echo "Closing Date: ".$ergo->finish_date;


