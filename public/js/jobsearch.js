var data = [
    {
        id: 0,
        text: 'website front-end'
    },
    {
        id: 1,
        text: 'website back-end'
    },
    {
        id: 2,
        text: 'mobile android'
    },
    {
        id: 3,
        text: 'mobile IOS'
    }
];

var emptydata=[] 

$(document).ready(function(){
  var isNameFilter = true;

  $("#search-select2").select2({placeholder: "search by name"});

  $('#by-category').click(function(event){
    $("#search-select2").select2({
      placeholder: "search by skill category",
      data:data
    });
  });

  $('#by-name').click(function(event){
    $("#search-select2").select2({placeholder: "search by name"});
    $('#search-select2').empty();
  });


  $("#search-btn").click( function(event) {
    $.get('tes');
    alert('ssss');
  });

  $('.search-panel .dropdown-menu').find('a').click(function(e) {
  	e.preventDefault();
  	var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
  	$('.search-panel span#search_concept').text(concept);
  	$('.input-group #search_param').val(param);
  });

});
