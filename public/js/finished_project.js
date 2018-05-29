var items={};
var total_pay = 0;
var selected_id = null;

function setId(userId){
  selected_id = userId;
}

function remove(id){
    total_pay-=parseInt(items[$('#row-'+id+' .col-sm-5 p').text()][1]);
    delete items[$('#row-'+id+' .col-sm-5 p').text()];
    $('#row-'+id).remove();
    $('#pay-sum').text('Total pay : '+total_pay+" point");
    // console.log(items);
}

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var id=0;
  $('#add-skill').click(function(event){
    var skill=$('#input-skill :selected').text();
    var point=$('#input-point').val();
    if(skill in items){
      return;
    }
    else{
      var max_val = $('#input-skill :selected').attr('max');
      if(parseInt(max_val)<parseInt(point)){
        alert('Can\'t add more than '+max_val+' point to '+skill);
        return;
      }
      total_pay += parseInt($('#input-point').val());
      items[skill]=[$('#input-skill').val(),point];
      $('#pay-sum').text('Total pay : '+total_pay+" point");
      $('#skill-list').append(
        '<div class="row skill-row d-flex justify-content-center" id="row-'+id+'">'+
        '<div class="col-sm-5" style="text-align:left;">'+
        '<p>'+skill+'</p>'+
        '</div>'+
        '<div class="col-sm-2" style="text-align:left;">'+
        '<p>'+point+'</p>'+
        '</div>'+
        '<div class="col-sm-3" style="text-align:left;">'+
        '<input type="button" class="skill-remove" value="cancel" onclick="remove('+id+')"/>'+
        '</div>'+
        '</div>'
      );
      id++;
    }
    console.log(items);

  });

  $('#submit-pay').click(function(event){
    var skill_list = {};
    $.each( items, function( key, value ) {
      skill_list[ value[0] ] = value[1];
    });
    var data_send = JSON.stringify({"worker_id" : selected_id,skill_list});
    console.log(data_send);
    $('input[name="data_send"]').val(data_send);
  });

});
