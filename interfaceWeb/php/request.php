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

/**
 * \file request.php
 * \brief Gère les requetes AJAX
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */
require_once('InterfaceBDD.php');

/**
 * \brief Envoie un message encodé en JSON avec un header
 * 
 * \param string $message Message à envoyer
 * \param string $h header à envoyer
 */
function sendJsonData($message, $h) {
    header($h);
    header('Content-Type: text/plain; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    echo json_encode($message);
}

/**
 * \brief Si la valeur est négative renvoie 0
 * 
 * \param int $val valeur en entrée
 * 
 * \return int valeur de retour
 */
function cscore($val) {
    if ($val < 0) {
        return 0;
    }

    return $val;
}

$db = new InterfaceBDD(); /**< \brief Connexion à la BDD */

if (!$db->getBdd()) { //Si non connecté
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

/* Début récupération informations pour gérer la requete AJAX */
$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD'); /**< \brief Récupération de la méthode HTTP */
$tmp = substr(filter_input(INPUT_SERVER, 'PATH_INFO'), 1); /**< \brief Récupération du PATH_INFO */
$request = explode('/', $tmp); /**< \brief Séparation des éléments de la requète */
$requestRessource = array_shift($request); /**< \brief Récupération de la ressource demandée */

if ($requestRessource === 'startGame' && $requestMethod === 'POST') { //Début du jeu
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (isset($id)) {
        session_start();
        $tmpquiz = $db->RequestGameReadyQuestions($id); //Récupération des questions
        $quiz = [];
        foreach ($tmpquiz as $elem) {
            array_push($quiz, array(
                'proposition' => $elem['proposition'],
                'choix_un' => $elem['choix_un'],
                'choix_deux' => $elem['choix_deux'],
                'valeur_reponse' => $elem['valeur_reponse']
                    )
            );
        }

        /* Stockage des infos du jeu dans la session PHP */
        $_SESSION['id_partie'] = $id; //Identifiant de la partie
        $_SESSION['quiz'] = $quiz; // Set de questions
        $_SESSION['cursor'] = 0; //Curseur question en cours
        $_SESSION['gameScore'] = []; //Score de la partie

        /* Enregistrement du temps de début de la partie et du curseur */
        array_push($_SESSION['gameScore'], array($_SESSION['cursor'], time(), -1, -1));

        $tmpout = $_SESSION['quiz'][$_SESSION['cursor']]; //Préparation question à envoyer
        $output = array(
            'progress' => 100 * $_SESSION['cursor'] / sizeof($_SESSION['quiz']),
            'proposition' => $tmpout['proposition'],
            'choix_un' => $tmpout['choix_un'],
            'choix_deux' => $tmpout['choix_deux']
        );

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie la question
    }
} else if ($requestRessource === 'checkAnswer' && $requestMethod === 'POST') { //Vérification réponse jeu
    $value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT);

    if (isset($value)) {
        session_start();
        $_SESSION['gameScore'][$_SESSION['cursor']][2] = time(); //On enregistre le moment répondu par l'user 
        if ($value === $_SESSION['quiz'][$_SESSION['cursor']]['valeur_reponse']) { //Réponse valide
            $_SESSION['gameScore'][$_SESSION['cursor']][3] = 1;
            $output = array(
                'value' => $value,
                'result' => true
            );
        } else { //Réponse fausse
            $_SESSION['gameScore'][$_SESSION['cursor']][3] = 0;
            $output = array(
                'value' => $value,
                'result' => false
            );
        }

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    }
} else if ($requestRessource === 'nextAnswer' && $requestMethod === 'POST') { //Envoi de la question suivante ou fin du jeu
    session_start();

    $_SESSION['cursor'] = $_SESSION['cursor'] + 1; //Incrémentation curseur

    if ($_SESSION['cursor'] < sizeof($_SESSION['quiz'])) { //S'il reste des questions
        /* Enregistrement du temps de début de la partie et du curseur */
        array_push($_SESSION['gameScore'], array($_SESSION['cursor'], time(), -1, -1));

        $tmpout = $_SESSION['quiz'][$_SESSION['cursor']]; //Préparation question à envoyer
        $output = array(
            'progress' => 100 * $_SESSION['cursor'] / sizeof($_SESSION['quiz']),
            'proposition' => $tmpout['proposition'],
            'choix_un' => $tmpout['choix_un'],
            'choix_deux' => $tmpout['choix_deux']
        );

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie la réponse
    } else {
        $totalTime = 0;
        $totalScore = 0;
        foreach ($_SESSION['gameScore'] as $score) { //Calcul du score
            $dt = ($score[2] - $score[1]); //Delta temps
            $t = $dt;

            $totalScore += 100 * $score[3] * cscore(10 - $t); //Calcul
            $totalTime += $dt; //Ajout
        }

        /* Préparation du score à envoyer */
        $output = array(
            'score' => $totalScore,
            'time' => $totalTime
        );

        /* Création Score utilisateur */
        $possede = new Possede();
        $possede->create($_SESSION['id_partie'], $_SESSION['id_utilisateur'], $totalScore, $totalTime);


        if (!$db->AddPossede($possede)) { //Si pas ajout raté
            error_log('Erreur : Impossible d\'ajouter le score !');
        }

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    }
} else {/**< Demande invalide */
    header('HTTP/1.1 400 Bad Request');//Aie
}

exit; /**< On part */
?>