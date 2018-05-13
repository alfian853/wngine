var items={};
function remove(id){
    delete items[$('#row-'+id+' .col-sm-5 p').text()];
    $('#row-'+id).remove();
    console.log(items);
}

$(document).ready(function() {
  var id=0;
  $('#add-skill').click(function(event){
    var skill=$('#input-skill').val();
    var point=$('#input-point').val();

    if(skill in items){
      return;
    }
    else{
      items[skill]=point;
      $('#skill-list').append(
        '<div class="row skill-row " id="row-'+id+'">'+
        '<div class="col-sm-5">'+
        '<p>'+skill+'</p>'+
        '</div>'+
        '<div class="col-sm-2">'+
        '<p>'+point+'</p>'+
        '</div>'+
        '<div class="col-sm-1">'+
        '<input type="button" class="skill-remove" value="cancel" onclick="remove('+id+')"/>'+
        '</div>'+
        '</div>'
      );
      id++;
    }
    console.log(items);
  });

  $('#submit-job').click(function(event){
    console.log(JSON.stringify(items));
    $('#job-list').val(JSON.stringify(items));
  });




});
