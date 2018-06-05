<?php
define('ENVIRONMENT', 't');
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Kévin Le Torc'h" />
        <title>Burger Quiz</title>


        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
    </head>
    <body>
        <?php require_once("includes/nav.template.php"); ?>
        <div class="container-fluid" style="margin-top:100px;">
            <h1>hello world</h1>
            <?php
            require_once('php/InterfaceBDD.php');

            $db = new InterfaceBDD();

            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

            if (isset($action)) {
                if ($action === 'register') {
                    $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
                    $prenom = filter_input(INPUT_GET, 'prenom', FILTER_SANITIZE_STRING);
                    $nom = filter_input(INPUT_GET, 'nom', FILTER_SANITIZE_STRING);
                    $pass1 = filter_input(INPUT_GET, 'pass1', FILTER_SANITIZE_STRING);
                    $pass2 = filter_input(INPUT_GET, 'pass2', FILTER_SANITIZE_STRING);

                    if (isset($pass1) && isset($pass2)) {
                        if (!($pass1 === $pass2)) {
                            echo '<h2> Erreur : Mot de passes non identiques </h2>';
                        } else {
                            $mdp = $pass1;
                        }
                    } else {
                        echo '<h2> Erreur : Un ou plusier mot de passe manquant </h2>';
                    }

                    if (!(isset($mail) && isset($prenom) && isset($nom))) {
                        echo '<h2> Erreur : Un des champs nécessaire à l\'inscription est manquant </h2>';
                    } else {
                        $user = new Utilisateur();
                        $user->create(0, $mail, $prenom, $nom, $mdp);

                        if (!$db->AddUser($user)) {
                            echo '<h2> Erreur : Impossible de rajouter un utilisateur </h2>';
                        } else {
                            session_start();
                            $_SESSION['isConnected'] = true;
                            $_SESSION['login'] = $mail;

                            header('Location: /');
                        }
                    }
                } else if ($action === 'connect') {
                    $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
                    $pass = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

                    if (!(isset($mail) && isset($pass))) {
                        echo '<h2> Erreur : Identifiants incorects </h2>';
                    } else if ($db->CheckUser($mail, $pass)) {
                        session_start();
                        $_SESSION['isConnected'] = true;
                        $_SESSION['login'] = $mail;

                        echo '<h2> Bienvenue ' . $mail;
                        header('Location: /');
                    } else {
                        echo '<h2> Erreur : Identifiants incorrects </h2>';
                    }
                } else if ($action === 'disconnect') {
                    $_SESSION['login'] = null;
                    $_SESSION['isConnected'] = false;
                    session_destroy();
                }
            }
            ?>
        </div>
        <?php require_once("includes/footer.template.php"); ?>
    </body>
</html>
