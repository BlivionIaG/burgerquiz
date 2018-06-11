'use strict';

$(() => {
    $('#bq-searchbar').on('input', function(event) {
        event.preventDefault();

        if ($('#bq-searchbar').val().length > 0) {
            var term = $('#bq-searchbar').val().trim();

            var tmp = [];
            $('#bq-searchtab > tbody').children().each(
                    function (index, element) {
                        tmp.push($(element).text());
                    }
            );

            $('#bq-searchtab > tbody').children().hide();
            $('#bq-searchtab > tbody').children().eq(0).show();


            for (var i = 0; i < tmp.length; i++) {
                if (tmp[i].includes(term)) {
                    $('#bq-searchtab > tbody').children().eq(i).show();
                }
            }
        } else {
            $('#bq-searchtab > tbody').children().show();
        }
    });
});