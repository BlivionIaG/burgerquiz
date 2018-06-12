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
        <meta name="description" content="Rejoindre Partie">
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
        <div class="container-fluid base-main-content">
            <h1 align="center" id="bq-info-page"> Rejoindre Partie </h1>   
            <input class="form-control mr-sm-2" id="bq-searchbar" type="text" placeholder="Search..." aria-label="Search">
            <form action="action.php" method="GET" id="bq-join" >
                <input type="hidden" name="action" value="join"> 
                <table id="bq-searchtab" class="bq-table">
                    <tr>
                        <th> Partie </th>
                        <th> Thème </th>
                        <th> Jouer <th>
                    </tr>
                    <?php
                    require_once('php/InterfaceBDD.php');
                    $db = new InterfaceBDD();

                    $parties = $db->RequestAllPartiesWithTheme();

                    foreach ($parties as $partie) {
                        echo '<tr>';
                        echo '<td>' . $partie['nom_partie'] . '</td>';
                        echo '<td>' . $partie['nom_theme'] . '</td>';
                        echo '<td><input name="id_partie" value="' . $partie['id_partie'] . '" type="radio"></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                <input class="bq-button" type="submit" value="Jouer">
            </form>
            <button id="bq-fixed-retour" onclick="location.href = 'parties.php';"> Retour </button>
        </div>
        <?php require_once("includes/footer.template.php"); ?>

        <!-- Appel des Scripts -->
        <script src="vendor/jquery/jquery.slim.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>   
        <script src="js/searchbar.js"></script>

    </body>
</html>