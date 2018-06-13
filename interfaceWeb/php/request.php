<?php

require_once('InterfaceBDD.php');

function sendJsonData($message, $h) {
    header($h);
    header('Content-Type: text/plain; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    echo json_encode($message);
}

function cscore($val){
    if($val < 0){
        return 0;
    }
    
    return $val;
}

$db = new InterfaceBDD();

if (!$db->getBdd()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$tmp = substr(filter_input(INPUT_SERVER, 'PATH_INFO'), 1);
$request = explode('/', $tmp);
$requestRessource = array_shift($request);

if ($requestRessource === 'startGame' && $requestMethod === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (isset($id)) {
        session_start();
        $tmpquiz = $db->RequestGameReadyQuestions($id);
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

        $_SESSION['quiz'] = $quiz;
        $_SESSION['cursor'] = 0;
        $_SESSION['gameScore'] = [];

        array_push($_SESSION['gameScore'], array($_SESSION['cursor'], time(), -1, -1));

        $tmpout = $_SESSION['quiz'][$_SESSION['cursor']];
        $output = array(
            'progress' => 100 * $_SESSION['cursor'] / sizeof($_SESSION['quiz']),
            'proposition' => $tmpout['proposition'],
            'choix_un' => $tmpout['choix_un'],
            'choix_deux' => $tmpout['choix_deux']
        );

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    }
} else if ($requestRessource === 'checkAnswer' && $requestMethod === 'POST') {
    $value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT);

    if (isset($value)) {
        session_start();
        $_SESSION['gameScore'][$_SESSION['cursor']][2] = time();
        if ($value === $_SESSION['quiz'][$_SESSION['cursor']]['valeur_reponse']) {
            $_SESSION['gameScore'][$_SESSION['cursor']][3] = 1;
            $output = array(
                'value' => $value,
                'result' => true
            );
        } else {
            $_SESSION['gameScore'][$_SESSION['cursor']][3] = 0;
            $output = array(
                'value' => $value,
                'result' => false
            );
        }

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    }
} else if ($requestRessource === 'nextAnswer' && $requestMethod === 'POST') {
    session_start();

    $_SESSION['cursor'] = $_SESSION['cursor'] + 1;

    if ($_SESSION['cursor'] < sizeof($_SESSION['quiz'])) {
        array_push($_SESSION['gameScore'], array($_SESSION['cursor'], time(), -1, -1));

        $tmpout = $_SESSION['quiz'][$_SESSION['cursor']];
        $output = array(
            'progress' => 100 * $_SESSION['cursor'] / sizeof($_SESSION['quiz']),
            'proposition' => $tmpout['proposition'],
            'choix_un' => $tmpout['choix_un'],
            'choix_deux' => $tmpout['choix_deux']
        );

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    } else {
        $totalTime = 0;
        $totalScore = 0;
        foreach ($_SESSION['gameScore'] as $score) {
            $dt = ($score[2] - $score[1]);

            if ($dt === 0) {
                $t = 1;
            } else {
                $t = $dt;
            }

            $totalScore += 100 * $score[3] * cscore(10 - $t);
            $totalTime += $dt;
        }

        $output = array(
            'score' => $totalScore,
            'time' => $totalTime
        );

        sendJsonData($output, 'HTTP/1.1 200 OK'); // On envoie le résultat
    }
} else {
    header('HTTP/1.1 400 Bad Request');
}

exit;
?>