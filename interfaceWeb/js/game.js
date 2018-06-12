'use strict';

$(() => {
    $('#startGame').off('click').click((event) => {
        event.preventDefault();
        var partie = $('#id_partie').val();

        ajaxRequest('POST', 'php/request.php/startGame/', startGame, 'id=' + partie);
    });
});

function startGame(ajaxResponse) {
    showQuestion(JSON.parse(ajaxResponse));
}

function continueGame(ajaxResponse) {
    $response = JSON.parse(ajaxResponse);
    if ($response['proposition'] !== null && $response['choix_un'] !== null && $response['choix_deux'] !== null && $response['progress'] !== null) {
        showQuestion($response);
    } else if ($response['score'] !== null && $response['time'] !== null) {

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
    $('#bq-reponses').append(choix_un);
    $('#bq-choix_un').off('click').click(answerChoix_un);

    var les_deux = document.createElement('button');
    les_deux.id = 'bq-les_deux';
    les_deux.innerHTML = 'Les deux';
    $('#bq-reponses').append(les_deux);
    $('#bq-les_deux').off('click').click(answerLes_deux);

    var choix_deux = document.createElement('button');
    choix_deux.id = 'bq-choix_deux';
    choix_deux.innerHTML = question['choix_deux'];
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

