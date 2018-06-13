'use strict';
$(() => {
    $('#startGame').off('click').click((event) => {
        event.preventDefault();
        var partie = $('#bq-id_partie').val();
        console.log(partie);
        ajaxRequest('POST', 'php/request.php/startGame/', startGame, 'id=' + partie);
    });
});

function isset(variable) {
    if (typeof (variable) === 'undefined' || typeof (variable) === null) {
        return false;
    }

    return true;
}

function startGame(ajaxResponse) {
    $('#startGame').remove();
    showQuestion(JSON.parse(ajaxResponse));
}

function continueGame(ajaxResponse) {
    var response = JSON.parse(ajaxResponse);
    if (isset(response['score']) && isset(response['time'])) {
        endGame(response);
    } else if (isset(response['proposition']) && isset(response['choix_un']) && isset(response['choix_deux']) && isset(response['progress'])) {
        showQuestion(response);
    }
}

function showQuestion(question) {
    $('#bq-proposition').empty();
    $('#bq-reponses').empty();
    $('#bq-progress-bar').empty();

    var proposition = document.createElement('h1');
    proposition.id = 'bq-info-page';
    proposition.align = 'center';
    proposition.innerHTML = question['proposition'];
    $('#bq-proposition').append(proposition);

    var choix_un = document.createElement('button');
    choix_un.id = 'bq-choix_un';
    choix_un.innerHTML = question['choix_un'];
    $('#bq-choix_un').prop('id', '');
    $('#bq-reponses').append(choix_un);
    $('#bq-choix_un').off('click').click(answerChoix_un);

    var les_deux = document.createElement('button');
    les_deux.id = 'bq-les_deux';
    les_deux.innerHTML = 'Les deux';
    $('#bq-les_deux').prop('id', '');
    $('#bq-reponses').append(les_deux);
    $('#bq-les_deux').off('click').click(answerLes_deux);

    var choix_deux = document.createElement('button');
    choix_deux.id = 'bq-choix_deux';
    choix_deux.innerHTML = question['choix_deux'];
    $('#bq-choix_deux').prop('id', '');
    $('#bq-reponses').append(choix_deux);
    $('#bq-choix_deux').off('click').click(answerChoix_deux);

    var progress_bar = document.createElement('div');
    progress_bar.style = 'background-color: #dba636;height: 25px; width:' + question['progress'] + '%';
    $('#bq-progress-bar').append(progress_bar);
}

function answerLes_deux(event) {
    event.preventDefault();
    checkAnswer(0);
}

function answerChoix_un(event) {
    event.preventDefault();
    checkAnswer(1);
}

function answerChoix_deux(event) {
    event.preventDefault();
    checkAnswer(2);
}

function checkAnswer(value) {
    ajaxRequest('POST', 'php/request.php/checkAnswer/', answerResult, 'value=' + value);
}

function nextAnswer() {
    ajaxRequest('POST', 'php/request.php/nextAnswer/', continueGame);
}

function answerResult(ajaxResponse) {
    var result = JSON.parse(ajaxResponse);
    var reponse = document.createElement('button');
    reponse.class = 'bq-reponse';
    switch (result['value']) {
        case '0':
            $('#bq-choix_un').remove();
            $('#bq-choix_deux').remove();
            reponse.id = 'bq-les_deux';
            break;
        case '1':
            $('#bq-les_deux').remove();
            $('#bq-choix_deux').remove();
            reponse.id = 'bq-choix_un';
            break;
        case '2':
            $('#bq-choix_un').remove();
            $('#bq-les_deux').remove();
            reponse.id = 'bq-choix_deux';
            break;
    }

    if (result['result'] === true) {
        reponse.innerHTML = 'Gagné !';
    } else {
        reponse.innerHTML = 'Perdu !';
    }

    $('#bq-reponses').append(reponse);
    $('#' + reponse.id).off('click').click(nextAnswer);
}

function endGame($results) {
    $('#bq-proposition').remove();
    $('#bq-reponses').remove();
    $('#bq-progress-bar').empty();

    var titre = document.createElement('h1');
    titre.id = 'bq-info-page';
    titre.align = 'center';
    titre.innerHTML = 'Bien Joué !';
    $('.bq-game').append(titre);

    var subtitre = document.createElement('h2');
    subtitre.class = 'bq-sub-info';
    subtitre.id = 'bq-sub-info-finalscore';
    subtitre.innerHTML = 'Ton score :';
    $('#bq-play').append(subtitre);

    var score = document.createElement('div');
    score.id = 'bq-mybestscore';
    $('#bq-play').append(score);

    var circle = document.createElement('div');
    circle.class = 'bq-circle';
    circle.id = 'bq-the-score';
    $('#bq-mybestscore').append(circle);

    var scorevalue = document.createElement('span');
    scorevalue.innerHTML = $results['score'];
    $('#bq-the-score').append(scorevalue);

    var timevalue = document.createElement('span');
    timevalue.innerHTML = 'En ' + $results['time'] + 's';
    $('#bq-mybestscore').append(timevalue);

    var bretour = document.createElement('button');
    bretour.id = 'bq-retour';
    bretour.innerHTML = 'Retour';
    $('#bq-play').append(bretour);

    var bmesscores = document.createElement('a');
    bmesscores.href = 'mesScores.php';
    bmesscores.id = 'bq-mesScoresLink';
    bmesscores.innerHTML = 'Mes Scores';
    $('#bq-play').append(bmesscores);

    var progress_bar = document.createElement('div');
    progress_bar.style = 'background-color: #dba636;height: 25px; width:100%';
    $('#bq-progress-bar').append(progress_bar);

    $('#bq-retour').on('click', () => {
        window.location.href = "parties.php";
    });
}
