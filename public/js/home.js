$(document).ready(function() {
    $("#butUp").click( function(event) {
      $('#news').hide();
      $('#about').hide();
      $('#update').show();
    });
    $("#butAbout").click( function(event) {
      $('#news').hide();
      $('#update').hide();
      $('#about').show();
    });
    $("#butNews").click( function(event) {
      $('#update').hide();
      $('#about').hide();
      $('#news').show();
    });
});