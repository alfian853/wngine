$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    $("#search-button").click( function(event) {
      $('#search-form').submit();
    });
});
