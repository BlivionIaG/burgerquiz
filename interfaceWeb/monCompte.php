<?php
define('ENVIRONMENT', 't');

require_once('php/InterfaceBDD.php');
session_start();

if ($_SESSION['isConnected'] == false) {
    header('Location: index.php');
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
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
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <link href="css/general.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>

        <div class="container-fluid base-main-content">
            <form id="inscription" action="action.php" method="GET">                    
                <input type="hidden" name="action" value="updateUser">
                <h1 id="bq-info-page"> Mon Compte </h1>

                <div class="row">
                    <div class="col-sm-6 h-100">
                        <h2 class="bq-info-label"> Changer Nom / Prenom </h2>
                        <input class="bq-input-medium" name="prenom" type="text" placeholder="Prenom" value="<?php if(isset($user))echo $user->getPrenom();?>">
                        <input class="bq-input-medium" name="nom" type="text" placeholder="Nom" value="<?php if(isset($user))echo $user->getNom();?>">

                        <h2 class="bq-info-label"> Changer Email </h2>
                        <input class="bq-input-large" name="mail" type="mail" placeholder="Email Address">
                    </div>
                    <div class="col-sm-6 h-100">
                        <h2 class="bq-info-label"> Informations </h2>
                        <?php
                        if (isset($user)) {
                            echo '<p> ' . $user->getPrenom() . ' ' . $user->getNom() . ' </p>';
                            echo '<p> ' . $user->getMail() . ' </p>';
                        }
                        ?>
                        <h2 class="bq-info-label"> Changer Mot de Passe </h2>
                        <input class="bq-input-large" name="pass1" type="password" placeholder="Password">
                        <input class="bq-input-large" name="pass2" type="password" placeholder="Password Again">
                        <input class="bq-button" type="submit" value="Valider">
                    </div>
                </div>
            </form>

            <button id="bq-retour" onclick="location.href = 'menu.php';"> Retour </button>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
