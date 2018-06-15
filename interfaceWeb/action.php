<?php

/* 
 * Copyright (C) 2018 Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/** \file   action.php
 * \brief   Page responsable de la gestion des actions utilisateur
 *
 *  La page gère l'enregistrement de nouveaux utilisateurs, la connexion, 
 * la déconnexion, la mis à jour d'un utilisateur, la création de partie
 * et rejoindre une partie. 
 */
define('ENVIRONMENT', 't');

require_once('php/InterfaceBDD.php');

$db = new InterfaceBDD();

function redirect($location, $notifyTitle = null, $notifyContent = null, $notifyType = null, $notifyTime = null) {
    $redirectoptions = $location;

    if (isset($notifyTitle)) {
        $redirectoptions .= ('?notifyTitle=' . urlencode($notifyTitle));
        if (isset($notifyContent)) {
            $redirectoptions .= ('&notifyContent=' . urlencode($notifyContent));
        }
        if (isset($notifyType)) {
            $redirectoptions .= ('&notifyType=' . $notifyType);
        }
        if (isset($notifyTime)) {
            $redirectoptions .= ('&notifyTime' . $notifyTime);
        }
    }

    header('Location: ' . $redirectoptions);
    exit;
}

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
                redirect('index.php', 'Mot de passes non identiques', 'Veuillez recommencer', 'error');
            } else {
                $mdp = $pass1;
            }
        } else {
            error_log('Erreur : Un ou plusieurs mot de passe manquants');
            redirect('index.php', 'Un ou plusieurs mot de passe manquants', 'Avez vous rentré une deuxième fois le mot de passe pour le confirmer ?', 'error');
        }

        if (!(isset($mail) && isset($prenom) && isset($nom))) {
            error_log('Erreur : Un des champs nécessaire à l\'inscription est manquant');
            redirect('index.php', 'Inscription impossible', 'Un des champs nécessaire à l\'inscription est manquant', 'error');
        } else {
            $user = new Utilisateur();
            $user->create(0, $mail, $prenom, $nom, $mdp);

            if (!$db->AddUser($user)) {
                error_log('Erreur : Impossible de rajouter un utilisateur');
                redirect('index.php', 'Impossible de rajouter un utilisateur');
            } else {
                session_start();
                $_SESSION['isConnected'] = true;
                $_SESSION['login'] = $mail;
                $_SESSION['id_utilisateur'] = $db->FindUser($mail);

                $user = $db->RequestUser($db->FindUser($mail));
                $_SESSION['user'] = $user[0]->toArray();

                redirect('menu.php', 'Inscription réussie !', '', 'ok');
            }
        }
    } else if ($action === 'connect') {
        $mail = filter_input(INPUT_GET, 'login', FILTER_SANITIZE_EMAIL);
        $pass = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

        if (!(isset($mail) && isset($pass))) {
            error_log('Erreur : Identifiants invalides');
            redirect('index.php', 'Identifiants invalides', 'Vérifiez que vous avez rentré correctement votre addresse mail et mot de passe', 'error');
        } else if (($id = $db->CheckUser($mail, $pass))) {
            session_start();
            $_SESSION['isConnected'] = true;
            $_SESSION['login'] = $mail;
            $_SESSION['id_utilisateur'] = $db->FindUser($mail);

            $user = $db->RequestUser($id);
            $_SESSION['user'] = $user[0]->toArray();

            redirect('menu.php', 'Connexion réussie !', '', 'ok');
        } else {
            error_log('Erreur : Identifiants incorrects');
            redirect('index.php', 'Identifiants incorrects', 'Le mot de passe ne correspond pas à l\'utilisateur donné', 'error');
        }
    } else if ($action === 'disconnect') {
        session_start();
        session_destroy();

        redirect('index.php', 'Déconnexion réussie !', '', 'ok');
    } else if ($action === 'updateUser') {
        session_start();

        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        $prenom = filter_input(INPUT_GET, 'prenom', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_GET, 'nom', FILTER_SANITIZE_STRING);
        $pass1 = filter_input(INPUT_GET, 'pass1', FILTER_SANITIZE_STRING);
        $pass2 = filter_input(INPUT_GET, 'pass2', FILTER_SANITIZE_STRING);

        if (isset($pass1) && isset($pass2)) {
            if (!($pass1 === $pass2)) {
                error_log('Erreur : Mot de passes non identiques');
                redirect('monCompte.php', 'Mot de passes non identiques', 'Veuillez recommencer', 'error');
            } else {
                $mdp = $pass1;
            }
        } else {
            error_log('Erreur : Un ou plusieurs mot de passe manquants');
            redirect('monCompte.php', 'Un ou plusieurs mot de passe manquants', 'Avez vous rentré une deuxième fois le mot de passe pour le confirmer ?', 'error');
        }

        $user = new Utilisateur();
        $user->fromArray($_SESSION['user']);

        if (isset($mail)) {
            $user->setMail($mail);
        }
        if (isset($prenom)) {
            $user->setPrenom($prenom);
        }
        if (isset($nom)) {
            $user->setNom($nom);
        }
        if (isset($mdp)) {
            $user->setMdp($mdp);
        } else {
            error_log('Erreur : Pas de mot de Passe défini');
            redirect('monCompte.php', 'Pas de mot de Passe défini', 'Veuillez rentrer votre mot de passe', 'error');
        }

        if (!$db->UpdateUser($user)) {
            error_log('Erreur : Impossible de mettre à jour l\'utilisateur');
            redirect('monCompte.php', 'Impossible de mettre à jour l\'utilisateur', '', 'error');
        }

        redirect('monCompte.php', 'Mise à jour de l\'utilisateur réussie', '', 'ok');
    } else if ($action === 'createPartie') {
        session_start();

        $id_theme = filter_input(INPUT_GET, 'id_theme', FILTER_SANITIZE_NUMBER_INT);
        $nom_partie = filter_input(INPUT_GET, 'nom_partie', FILTER_SANITIZE_STRING);

        if (!(isset($id_theme) && isset($nom_partie))) {
            error_log('Erreur : Paramètres de création de partie invalides');
            redirect('makepart.php', 'Paramètres de création de partie invalides', '', 'error');
        }

        $partie = new Partie();
        $partie->setNom_partie($nom_partie);

        //choix questions
        $questions = $db->RequestNRandomQuestionsByTheme($id_theme, 3);
        if (sizeof($questions) != 3) {
            error_log('Erreur : Pas assez de question pour ce thème');
            redirect('makepart.php', 'Pas assez de question pour ce thème', 'Veuillez changer de thème', 'error');
        }

        //Création Partie
        if (!$db->AddPartie($partie)) {
            error_log('Erreur : Nom partie déjà pris !');
            redirect('makepart.php', 'Nom partie déjà pris !', 'Veuillez changer le nom de la partie', 'error');
        }

        $id_partie = $db->FindPartieId($partie);
        if (!isset($id_partie)) {
            error_log('Erreur : ID partie non retrouvé !');
            redirect('makepart.php', 'ID partie non retrouvé !', '', 'error');
        }

        //Lien questions / partie
        foreach ($questions as $question) {
            $tmp = new comprend();
            $tmp->create($question->getId_question(), $id_partie);

            if (!$db->LinkQuestionToPartie($tmp)) {
                error_log('Erreur : Lien de la question vers la partie échoué');
                redirect('makepart.php', 'Lien de la question vers la partie échoué', '', 'error');
            }
        }

        header('Location: play.php?partie=' . $id_partie);
    } else if ($action === 'join') {
        $id_partie = filter_input(INPUT_GET, 'partie', FILTER_SANITIZE_NUMBER_INT);

        if (!isset($id_partie)) {
            error_log('Erreur : Pas d\'id de partie');
            redirect('joinpart.php', 'Pas d\'id de partie');
        }

        header('Location: play.php?partie=' . $id_partie);
    }
}
?>