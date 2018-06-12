<?php
define('ENVIRONMENT', 't');
session_start();

if (isset($_SESSION)) {
    if ($_SESSION['isConnected'] == false) {
        header('Location: index.php');
    }
}

$id_partie = filter_input(INPUT_GET, 'partie', FILTER_SANITIZE_NUMBER_INT);
if (!isset($id_partie) && $id_partie < 0) {
    header('Location: parties.php');
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
        <input type="hidden" id="id_partie" value=<?php echo '"'.$id_partie.'"'?>>
        
        <div class="container-fluid base-main-content bq-game">
            <button id="startGame">Commencer</button>
            <div id="bq-proposition">

            </div>
            <div id="bq-reponses">

            </div>
            <div id="bq-progress-bar">

            </div>
        </div>
        <?php require_once("includes/footer.template.php"); ?>       

        <script src="vendor/jquery/jquery.slim.min.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/game.js"></script>
    </body>
</html>
