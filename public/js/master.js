$(document).ready(function(){

    $(window).bind('scroll', function () {
        // if ($(window).scrollTop() > 106 && $(window).width() > 640) {
        //   $('#course_bar').addClass('floating-bar');
        // }
        // else{
        //   $('#course_bar').removeClass('floating-bar');
        // }
        if($(window).scrollTop()>8){
          $('#scroll_up').css({'visibility': 'visible'});
        }
        else{
          $('#scroll_up').css({'visibility': 'hidden'});
        }
    });
    $("#scroll_up").click( function(event) {
      if (this.hash !== "") {
          $('html, body').animate({scrollTop : 0},800);
         return false;
      }
    });




});
