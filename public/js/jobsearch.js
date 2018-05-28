var data = [
    {
        id: 1,
        text: 'website front-end'
    },
    {
        id: 2,
        text: 'website back-end'
    },
    {
        id: 3,
        text: 'mobile android'
    },
    {
        id: 4,
        text: 'mobile IOS'
    }
];

var idtimer = [];
var time_list = [];
//used for changing page
var latest_query = "";

function int_to_time(detik){
  var second = parseInt((detik%60));
  var minute = parseInt((detik%3600)/60);
  var hour = parseInt((detik/3600)%24);
  var day = parseInt((detik/86400));
  return ""+day+" D : "+hour+" H : "+minute+" m : "+second+" s";
}

function calcTimer(){
  idtimer.length = 0;
  time_list.length = 0;
  $('[id^=time-]').each(function(i,element){
    idtimer.push($('#time-'+i));
    time_list.push(idtimer[i].attr('value'));
  });
  setInterval(function() {
    for(var j = 0 ;j < time_list.length ; j++){
      if(time_list[j] > 0){
        idtimer[j].text(int_to_time(time_list[j]));
        time_list[j]--;
      }
      else{
        idtimer[j].text("time out");
      }
    }
  }, 1000);
}

$(document).ready(function(){
  var isNameFilter = true;

  $("#search-select2").select2({placeholder: "search by category"});

  function ajaxSearch(){
    var data_send = null;
    if(isNameFilter){
      data_send = JSON.stringify({"type":"name-filter","query" : $('#search-text').val()});
      latest_query = data_send;
    }
    else{
      data_send = JSON.stringify({"type":"skill-filter","data" : $('#search-select2').select2('data')});
      latest_query = data_send;
    }

    $.ajax({
      url: '/job/search_query',
      type: 'get',
      data: {data_send},
      success: function (data) {
        $('#search-result').html(data);
        calcTimer();
        ajax_refresh();
      }
    }).fail(function (xhr, error, thrownError) {
    console.log(xhr, error, thrownError);
    });
  }

  $('#by-category').click(function(event){
    if(isNameFilter == false){return;}
    isNameFilter = false;
    $('#search-text').css('display','none');
    $('<select id="search-select2" style="height:100%" multiple="true"></select>')
    .insertAfter('#search-text');
    $("#search-select2").select2({
      placeholder : "search by skill category",
      data : data
    });
  });

  $('#by-name').click(function(event){
    if(isNameFilter == true){return;}
    isNameFilter = true;
    $("#search-select2").select2('destroy');
    $("#search-select2").remove();
    $('#search-text').css('display','inline-block');
  });

  $('#search-text').keypress(function(e) {
    if(e.which == 13){
        ajaxSearch();
    }
  });

  function ajax_refresh(){
      $('.pagination li a').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        data_send = latest_query;
        $.ajax({
            url: $(this).attr('href').slice(21),//next page url
            type: 'get',
            data: {data_send},
            success: function(data){
                $('#search-result').html(data);
                calcTimer();
                ajax_refresh();
            }
        }).fail(function(xhr, error, thrownError){
            console.log(xhr, error, thrownError);
        });
    });
 }


  $("#search-btn").click( function(event) {
    ajaxSearch();
  });



  $('.search-panel .dropdown-menu').find('a').click(function(e) {
  	e.preventDefault();
  	var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
  	$('.search-panel span#search_concept').text(concept);
  	$('.input-group #search_param').val(param);
  });



});
