$(".button-collapse").sideNav();
$(".dropdown-button").dropdown();
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 2,
    min: Date.now(),

    monthsFull: [ 'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień' ],
    monthsShort: [ 'sty', 'lut', 'mar', 'kwi', 'maj', 'cze', 'lip', 'sie', 'wrz', 'paź', 'lis', 'gru' ],
    weekdaysFull: [ 'niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota' ],
    weekdaysShort: [ 'niedz.', 'pn.', 'wt.', 'śr.', 'cz.', 'pt.', 'sob.' ],
    today: 'Dzisiaj',
    clear: 'Usuń',
    close: 'Zamknij',
    firstDay: 1,
    format: 'yyyy-mm-dd'
});

$('#textarea1').val('New Text');
$('#textarea1').trigger('autoresize');

$(document).ready(function() {
    Materialize.updateTextFields();
});

$(document).ready(function() {
    $('input, textarea#count, textarea#description').characterCounter();
});
