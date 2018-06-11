<?php
define('ENVIRONMENT', 't');
session_start();

if (isset($_SESSION)) {
    if ($_SESSION['isConnected'] == false) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Menu Jeu">
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
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>
        <div  class="container-fluid base-main-content">
            <div class="partie-menu">
                <button onclick="location.href = 'makepart.php';"> Créer Partie </button>
                <button onclick="location.href = 'joinpart.php';"> Rejoindre Partie </button>
                <button onclick="location.href = 'menu.php';"> Retour </button>
            </div>
        </div>
        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
