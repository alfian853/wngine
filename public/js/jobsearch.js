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

var emptydata=[]

//used for changing page
var latest_query = "";
$(document).ready(function(){
  var isNameFilter = true;

  $("#search-select2").select2({placeholder: "search by category"});

  $('#by-category').click(function(event){
    if(isNameFilter == false){return;}
    isNameFilter = false;
    $('#search-text').css('display','none');
    $('<select id="search-select2" placeholder="di js nya" name="query[]" style="height:100%" multiple="true"></select>')
    .insertAfter('#search-text');
    $("#search-select2").select2({
      placeholder: "search by skill category",
      data:data
    });

  });

  $('#by-name').click(function(event){
    if(isNameFilter == true){return;}
    isNameFilter = true;
    $("#search-select2").select2('destroy');
    $("#search-select2").remove();
    $('#search-text').css('display','inline-block');
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
                ajax_refresh();
            }
        }).fail(function(xhr, error, thrownError){
            console.log(xhr, error, thrownError);
        });
    });
 }



  $("#search-btn").click( function(event) {
    console.log($('#search-select2').select2('data'));
    var data_send = null;
    if(isNameFilter){
      data_send = JSON.stringify({"type":"name-filter","query" : $('#search-text').val()});
      latest_query = data_send;
    }
    else{
      data_send = JSON.stringify({"type":"skill-filter","data" : $('#search-select2').select2('data')});
      latest_query = data_send;
    }
    // console.log(data_send);
    $.ajax({
      url: '/job/search_query',
      type: 'get',
      data: {data_send},
      success: function (data) {
          $('#search-result').html(data);
          ajax_refresh();
      }
    }).fail(function (xhr, error, thrownError) {
    console.log(xhr, error, thrownError);
    });

  });

  $('.search-panel .dropdown-menu').find('a').click(function(e) {
  	e.preventDefault();
  	var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
  	$('.search-panel span#search_concept').text(concept);
  	$('.input-group #search_param').val(param);
  });



});
