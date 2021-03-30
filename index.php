<?php
session_start();
require_once("Classes/Ergazomenos.php");
require_once("Classes/Database.php");
require_once("Classes/Ergo.php");


error_reporting(E_ALL);
ini_set('display_errors', 1);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cloup SA</title>
        <link rel = "icon" href = "img/logo_cloup.png" type = "image/x-icon">
	<link rel="stylesheet" href="css/Index.css">
    </head>
    <?php
    if (!isset($_SESSION['username'])) {

        if (!filter_input(INPUT_POST, 'username')) {
        
            ?>
         <body>
			<form class="box" action="" method="post">
			<h1>Login</h1>
			<input placeholder="Username" name="username" type="text">
            <input placeholder="Password" name="password" type="password">
            <input type="submit" value="Login" >
			</form>
		 </body>

            <?php

        } else { 

            $ergazomenos = new Ergazomenos();
            $ergazomenos->alias = filter_input(INPUT_POST,'username');
            $ergazomenos->crypto = filter_input(INPUT_POST,'password');

            $ergazomenos->login();

            if ($ergazomenos->kwd_ergazomenou !== -1) { 

                $_SESSION['username'] = $ergazomenos->alias;
                $_SESSION['kwd_ergazomenou'] = $ergazomenos->kwd_ergazomenou;
                $ergazomenos->getDb();
                $_SESSION['user_type_ergazom']=$ergazomenos->user_type_ergazom;
                
                header('location: index.php');
            }
            else
                {
                    header('location: index.php');
                }
        }

    }


    else {
      header('location: LoggedInPage.php');               
         }




