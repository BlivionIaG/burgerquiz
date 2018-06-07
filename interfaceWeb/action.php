<?php

define('ENVIRONMENT', 't');

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
                error_log('Erreur : Mot de passes non identiques');
            } else {
                $mdp = $pass1;
            }
        } else {
            error_log('Erreur : Un ou plusier mot de passe manquant');
        }

        if (!(isset($mail) && isset($prenom) && isset($nom))) {
            error_log('Erreur : Un des champs nécessaire à l\'inscription est manquant');
        } else {
            $user = new Utilisateur();
            $user->create(0, $mail, $prenom, $nom, $mdp);

            if (!$db->AddUser($user)) {
                error_log('Erreur : Impossible de rajouter un utilisateur');
            } else {
                session_start();
                $_SESSION['isConnected'] = true;
                $_SESSION['login'] = $mail;

                header('Location: menu.php');
            }
        }
    } else if ($action === 'connect') {
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        $pass = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

        if (!(isset($mail) && isset($pass))) {
            error_log('Erreur : Identifiants incorrects');
        } else if (($id = $db->CheckUser($mail, $pass))) {
            session_start();
            $_SESSION['isConnected'] = true;
            $_SESSION['login'] = $mail;

            $user = $db->RequestUser($id);
            $_SESSION['user'] = $user[0];

            header('Location: menu.php');
        } else {
            error_log('Erreur : Identifiants incorrects');
        }
    } else if ($action === 'disconnect') {
        session_start();
        session_destroy();

        header('Location: index.php');
    }
}
?>