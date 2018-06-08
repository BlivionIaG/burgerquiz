<?php
define('ENVIRONMENT', 't');
define('TOP_SCORE_NB', 5);

require_once('php/InterfaceBDD.php');
session_start();

if (isset($_SESSION)) {
    if ($_SESSION['isConnected'] == false) {
        header('Location: index.php');
    }

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    $db = new InterfaceBDD();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Palmares Utilisateurs">
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
            <h1 align="center" id="bq-info-page"> Palmares </h1>
            <div class="row">
                <div class="col-sm-6 h-100">
                    <h2 class="bq-sub-info"> TOP 5 Scores : </h2>
                    <?php
                    $scores = $db->GetTopScores(TOP_SCORE_NB);

                    $maxscore = $scores[0]->getScore();
                    foreach ($scores as $score) {
                        if ($maxscore < $score->getScore()) {
                            $maxscore = $score->getScore();
                        }
                    }

                    foreach ($scores as $score) {
                        $tmp = $score->getScore() / $maxscore * 50;
                        echo '<div class="bq-scoreboard" style="grid-template-columns: 35% ' . $tmp . '% ' . (50 - $tmp) . '% auto">' .
                        '           <div>' . $score->getPrenom() . ' ' . $score->getNom() . '-</div>' .
                        '           <div>' . $score->getScore() . '</div>' .
                        '           <div></div>' .
                        '           <div>';

                        $timestamp = $score->getTemps();
                        $hours = 0 + floor($timestamp / 3600);
                        $minutes = floor(($timestamp / 60) % 60);
                        $seconds = $timestamp % 60;
                        if (isset($hour) && $hour > 0) {
                            echo $hour . 'h ';
                        }
                        if (isset($minutes) && $minutes > 0) {
                            echo $minutes . 'm ';
                        }
                        echo $seconds . 's';

                        echo '</div>' .
                        '</div>';
                    }
                    ?>
                </div>
                <div class="col-sm-6 h-100">                    
                    <h2 class="bq-sub-info"> Mon meilleur Score : </h2>
                    <div id="bq-mybestscore">
                        <?php
                        if (isset($user)) {
                            $bestscore = $db->RequestBestScore($user->getId_utilisateur());
                            $timestamp = $bestscore->getTemps();
                            $hours = floor($timestamp / 3600);
                            $minutes = floor(($timestamp / 60) % 60);
                            $seconds = $timestamp % 60;

                            echo '<div class="bq-circle"><span>' . $bestscore->getScore() . '</span></div><span> en ';
                            if (isset($hour) && $hour > 0) {
                                echo $hour . 'h ';
                            }
                            if (isset($minutes) && $minutes > 0) {
                                echo $minutes . 'm ';
                            }
                            echo $seconds . 's';
                            echo '</span>';
                        }
                        ?>
                    </div>
                    <a href="mesScores.php" id="bq-mesScoresLink"> Mes Scores </a>
                </div>
            </div>

            <button id="bq-retour" onclick="location.href = 'menu.php';"> Retour </button>
        </div>

        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
