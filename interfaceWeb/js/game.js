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

'use strict';

var timer;

$(() => {
    $('#bq-timer').hide();
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


    clearInterval(timer);
    $('#bq-timer').show();
    var target = new Date().getTime() + 10000;
    timer = setInterval(() => {
        var now = new Date().getTime();
        console.log(target);
        console.log(now);
        var distance = target - now;

        document.getElementById("bq-timer").innerHTML = '<span>' + Math.floor((distance % (1000 * 60)) / 1000) + '<span>';

        if (distance < 0) {
            clearInterval(timer);
            document.getElementById("bq-timer").innerHTML = "<span> 0 </span>";
        }
    }, 100);
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
    if (result['result'] === true) {
        reponse.innerHTML = 'Gagné !';
    } else {
        reponse.innerHTML = 'Perdu !';
    }

    switch (result['value']) {
        case '0':
            $('#bq-choix_un').remove();
            $('#bq-choix_deux').remove();
            $('#bq-les_deux').off('click').click(nextAnswer);
            reponse.id = 'bq-sel-les_deux';
            $(reponse).insertBefore('#bq-les_deux');
            break;
        case '1':
            $('#bq-les_deux').remove();
            $('#bq-choix_deux').remove();
            $('#bq-choix_un').off('click').click(nextAnswer);
            reponse.id = 'bq-sel-choix_un';
            $(reponse).insertBefore('#bq-choix_un');
            break;
        case '2':
            $('#bq-choix_un').remove();
            $('#bq-les_deux').remove();
            $('#bq-choix_deux').off('click').click(nextAnswer);
            reponse.id = 'bq-sel-choix_deux';
            $(reponse).insertBefore('#bq-choix_deux');
            break;
    }

    $('#bq-timer').hide();

    $('#' + reponse.id).off('click').click(nextAnswer);
}

function endGame(results) {
    $('#bq-play').empty();
    $('#bq-timer').hide();

    var titre = document.createElement('h1');
    titre.id = 'bq-info-page';
    titre.align = 'center';
    titre.innerHTML = 'Bien Joué !';
    $('#bq-play').append(titre);

    var br = document.createElement('br');
    $('#bq-play').append(br);

    var subtitre = document.createElement('h2');
    subtitre.className = 'bq-sub-info';
    subtitre.id = 'bq-sub-info-finalscore';
    subtitre.innerHTML = 'Ton score :';
    $('#bq-play').append(subtitre);

    var score = document.createElement('div');
    score.id = 'bq-mybestscore';
    $('#bq-play').append(score);

    var circle = document.createElement('div');
    circle.className = 'bq-circle';
    circle.innerHTML = '<span>' + results['score'] + '</span>';
    $('#bq-mybestscore').append(circle);

    var timevalue = document.createElement('span');
    timevalue.innerHTML = 'En ' + results['time'] + 's';
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

    var bq_progress_bar = document.createElement('div');
    bq_progress_bar.id = 'bq-progress-bar';
    $('#bq-play').append(bq_progress_bar);

    var progress_bar = document.createElement('div');
    progress_bar.style = 'background-color: #dba636;height: 25px; width:100%';
    $('#bq-progress-bar').append(progress_bar);

    $('#bq-retour').on('click', () => {
        window.location.href = "parties.php";
    });
}
