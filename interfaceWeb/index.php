<?php
define('ENVIRONMENT', 't');
if ($_SESSION['isConnected'] == true) {
    header('Location: menu.php');
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
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.php">BURGER QUIZ</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form id="connect" action="action.php" method="GET">
                    <input type="hidden" name="action" value="connect">
                    <input name="mail" type="mail" placeholder="Email address">
                    <input name="password" type="password" placeholder="Password">
                    <input type="submit" class="bq-button" value="Connexion">
                </form>
            </div>
        </nav>

        <div class="container-fluid base-main-content">
            <div class="row">
                <div class="col-sm-6 h-100">
                    <img id="main-logo" src="img/burger.png">
                </div>
                <div class="col-sm-6 h-100">
                    <h1 id="inscriptionTitle"> Inscription </h1>
                    <form id="inscription" action="action.php" method="GET">                    
                        <input type="hidden" name="action" value="register">
                        <input class="bq-input-medium" name="prenom" type="text" placeholder="Prenom">
                        <input class="bq-input-medium" name="nom" type="text" placeholder="Nom">
                        <input class="bq-input-large" name="mail" type="mail" placeholder="Email Address">
                        <input class="bq-input-large" name="pass1" type="password" placeholder="Password">
                        <input class="bq-input-large" name="pass2" type="password" placeholder="Password Again">
                        <input class="bq-button" type="submit" value="Inscription">
                    </form>
                </div>
            </div>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
