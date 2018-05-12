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


  $("#search-btn").click( function(event) {
    $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    alert($('#search-select2').select2('data'));
    console.log($('#search-select2').select2('data'));
    var data_send = null;
    if(isNameFilter){
      data_send = JSON.stringify({"text" : $('#search-text').val()});
    }
    else{
      data_send = JSON.stringify($('#search-select2').select2('data'));
    }
    console.log(data_send);
    $.ajax({
      type: 'post',
      url: 'tesdoang',
      data: {'query':data_send},
      success: function (data) {
          alert('successss '+data);
      },
      error: function(data){
        console.log(data);
      }
  });



    // $.get( "tesdoang",function(data) {
    //  alert( "success" +data);
    // })
    //  .done(function() {
    //    alert( "second success" );
    //  })
    //  .fail(function() {
    //    alert( "error" );
    //  })
    //  .always(function() {
    //    alert( "finished" );
    //  });

  });

  $('.search-panel .dropdown-menu').find('a').click(function(e) {
  	e.preventDefault();
  	var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
  	$('.search-panel span#search_concept').text(concept);
  	$('.input-group #search_param').val(param);
  });

});
