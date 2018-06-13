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

define('ENVIRONMENT', 't');

require_once('php/InterfaceBDD.php');
session_start();

if (isset($_SESSION)) {
    if ($_SESSION['isConnected'] == false) {
        header('Location: index.php');
    }

    if (isset($_SESSION['user'])) {
        $user = new Utilisateur();
        $user->fromArray($_SESSION['user']);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Menu édition compte">
        <meta name="author" content="Kévin Le Torc'h et Antoine Orhant">

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="vendor/fonts.googleapis/bubblegum-sans.css" rel="stylesheet">
        <link href="css/general.css" rel="stylesheet" type="text/css">
        <link href="css/notify.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>

        <div class="container-fluid base-main-content">
            <form id="updateInfo" action="action.php" method="GET">                    
                <input type="hidden" name="action" value="updateUser">
                <h1 id="bq-info-page"> Mon Compte </h1>

                <div class="row">
                    <div class="col-sm-6 h-100">
                        <h2 class="bq-info-label"> Changer Nom / Prenom </h2>
                        <input class="bq-input-medium" name="prenom" type="text" placeholder="Prenom" value="<?php if (isset($user)) echo $user->getPrenom(); ?>">
                        <input class="bq-input-medium" name="nom" type="text" placeholder="Nom" value="<?php if (isset($user)) echo $user->getNom(); ?>">

                        <h2 class="bq-info-label"> Changer Email </h2>
                        <input class="bq-input-large" name="mail" type="email" placeholder="Email Address" value="<?php if (isset($user)) echo $user->getMail(); ?>">
                    </div>
                    <div class="col-sm-6 h-100">
                        <h2 class="bq-info-label"> Informations </h2>
                        <?php
                        if (isset($user)) {
                            echo '<pre> ' . $user->getPrenom() . ' ' . $user->getNom() . ' </pre>';
                            echo '<pre> ' . $user->getMail() . ' </pre>';
                        }
                        ?>
                        <h2 class="bq-info-label"> Changer Mot de Passe </h2>
                        <input class="bq-input-large" name="pass1" type="password" placeholder="Password" required>
                        <input class="bq-input-large" name="pass2" type="password" placeholder="Password Again" required>
                        <input class="bq-button" type="submit" value="Valider">
                    </div>
                </div>
            </form>

            <button id="bq-retour" onclick="location.href = 'menu.php';"> Retour </button>
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
