var item=[];
function remove(id){
    $('#row-'+id).remove();
    item.splice(id,1);
}

$(document).ready(function() {
  var id=0;
  $('#add-skill').click(function(event){
    var skill=$('#input-skill').val();
    var point=$('#input-point').val();
    item.push([skill,point]);
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
  });

  $('#submit-job').click(function(event){
    $('#job-list').val(JSON.stringify(item));
  });




});
