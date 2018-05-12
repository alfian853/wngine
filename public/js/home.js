$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    $("#search-button").click( function(event) {
      $('#search-form').submit();
    });
});
<select id="search-select2" placeholder="di js nya" name="query[]" style="height:100%" multiple="true">
</select>
