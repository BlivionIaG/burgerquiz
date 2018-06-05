<?php
define('ENVIRONMENT', 't');
session_start();

if ($_SESSION['isConnected'] == false) {
    error_log('menu :' . session_id());

    header('Location: index.php');
} else {
    echo '<script> alert("Bienvenue ' . $_SESSION['login'] . ' !");</script>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Menu utilisateur du site">
        <meta name="author" content="Kévin Le Torc'h et Antoine Orhant">

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>
        <div  class="container-fluid" style="margin-top:100px;">
            <?php
            echo '<h1> Bienvenue ' . $_SESSION['login'] . ' !</h1>';
            ?>
        </div>
        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
