'use strict';

function ajax_request(method, request, callback, data = null) {
    var xhr = new XMLHttpRequest();
    if (data !== null && (method === 'GET' || method === 'POST' || method === 'DELETE' || method === 'PUT')) {
        request += '?' + data;
    }

    xhr.open(method, request, true);

    xhr.onload = function () {
        console.log(xhr.status);

        switch (xhr.status) {
            case 200:
            case 201:
                console.log(xhr.responseText);
                callback(xhr.responseText);
                break;
            default:
                httpErrors(xhr.status);
        }
    };

    xhr.send(data);
}


function httpErrors(errorNumber) {
    var text = '<div class="alert alert-danger" role="alert">';
    text += '<span class="glyphicon glyphicon-exclamation-sign"></span>';

    switch (errorNumber) {
        case 400:
            // Bad request.
            text += '<strong> Requète incorrecte</strong>';
            break;
        case 401:
            // Unauthorized.
            text += '<strong> Authentifiez vous</strong>';
            break;
        case 403:
            // Forbidden.
            text += '<strong> Accès refusé</strong>';
            break;
        case 404:
            // Ressource not found.
            text += '<strong> Page non trouvée</strong>';
            break;
        case 500:
            // Internal server error.
            text += '<strong> Erreur interne du serveur</strong>';
            break;
        case 503:
            // Service unavailable.
            text += '<strong> Service indisponible</strong>';
            break;
        default:
            text += '<strong> HTTP erreur ' + errorNumber + '</strong>';
            break;
    }
    text += '</div>';
    
    $('#errors').html(text);
}