<?php

/* 
 * Copyright (C) 2018 Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * \file index.php
 * \brief Page d'accueil du site
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 05 juin 2018
 */
define('ENVIRONMENT', 't');

session_start();

if (isset($_SESSION['isConnected'])) {
    if ($_SESSION['isConnected'] == true) {
        header('Location: menu.php');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Accueil de Burgerquiz">
        <meta name="author" content="Kévin Le Torc'h et Antoine Orhant">

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/general.css" rel="stylesheet">
        <link href="vendor/fonts.googleapis/bubblegum-sans.css" rel="stylesheet">
        
        <link href="css/notify.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.php">BURGER QUIZ</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form id="connect" action="action.php" method="GET">
                    <input type="hidden" name="action" value="connect">
                    <input name="login" type="email" placeholder="Email address" required>
                    <input name="password" type="password" placeholder="Password" required>
                    <input type="submit" class="bq-button" value="Connexion">
                </form>
            </div>
        </nav>

        <div id="notify-container"></div>

        <div class="container-fluid base-main-content">
            <div class="row">
                <div class="col-sm-6 h-100">
                    <img id="main-logo" src="img/burger.png">
                </div>
                <div class="col-sm-6 h-100">
                    <h1 id="inscriptionTitle"> Inscription </h1>
                    <form id="inscription" action="action.php" method="GET">                    
                        <input type="hidden" name="action" value="register">
                        <input class="bq-input-medium" name="prenom" type="text" placeholder="Prenom" required>
                        <input class="bq-input-medium" name="nom" type="text" placeholder="Nom" required>
                        <input class="bq-input-large" name="mail" type="email" placeholder="Email Address" required>
                        <input class="bq-input-large" name="pass1" type="password" placeholder="Password" required>
                        <input class="bq-input-large" name="pass2" type="password" placeholder="Password Again" required>
                        <input class="bq-button" type="submit" value="Inscription">
                    </form>
                </div>
            </div>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
        <script src="vendor/jquery/jquery.slim.min.js"></script>
        <script src="js/notify.js"></script>

        <?php
        $notifyTitle = filter_input(INPUT_GET, 'notifyTitle', FILTER_SANITIZE_STRING);
        $notifyContent = filter_input(INPUT_GET, 'notifyContent', FILTER_SANITIZE_STRING);
        $notifyType = filter_input(INPUT_GET, 'notifyType', FILTER_SANITIZE_STRING);
        $notifyTime = filter_input(INPUT_GET, 'notifyTime', FILTER_SANITIZE_NUMBER_INT);

        if (isset($notifyContent)) {
            $notifyContent = urldecode($notifyContent);
        } else {
            $notifyContent = '';
        }

        if (!isset($notifyType)) {
            $notifyType = 'info';
        }

        if (!isset($notifyTime)) {
            $notifyTime = 10000;
        }

        if (isset($notifyTitle)) {
            echo '<script> new NotifyNotification("' . urldecode($notifyTitle) . '","' . $notifyContent . '","' . $notifyType . '");</script>';
        }
        ?>
    </body>
</html>
