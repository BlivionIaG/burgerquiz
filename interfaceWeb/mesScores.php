<?php
define('ENVIRONMENT', 't');

require_once('php/InterfaceBDD.php');
session_start();

if (isset($_SESSION)) {
    if ($_SESSION['isConnected'] == false) {
        header('Location: index.php');
    }

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Mes Scores">
        <meta name="author" content="Kévin Le Torc'h et Antoine Orhant">

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <link href="css/general.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>

        <div class="container-fluid base-main-content">
            <h1 align="center" id="bq-info-page"> Mes Scores </h1>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <button id="bq-retour" onclick="location.href = 'palmares.php';"> Retour </button>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>