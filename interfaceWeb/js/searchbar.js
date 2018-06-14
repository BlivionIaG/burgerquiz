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