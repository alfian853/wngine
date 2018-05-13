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
        '<div class="row skill-row d-flex justify-content-center" id="row-'+id+'">'+
        '<div class="col-sm-5" style="text-align:center;">'+
        '<p>'+skill+'</p>'+
        '</div>'+
        '<div class="col-sm-2" style="text-align:center;">'+
        '<p>'+point+'</p>'+
        '</div>'+
        '<div class="col-sm-3" style="text-align:center;">'+
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
