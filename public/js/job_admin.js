function editComment(email){
  // console.log();
  $('#edit-comment').val( $('td[value="'+email+'"] p').text() );
  $('#save-comment').val(email);
  $('#modal-comment .modal-title').text('comment for '+email);
}

function getDownloadUrl(email){
  var data_send = JSON.stringify({
          "job_id" : $('meta[name="job-id"]').attr('content'),
          "email": email
  });
  $.ajax({
    url: '/job/get_submission_url',
    type: 'GET',
    data: {data_send},
    success: function (data) {
      // console.log('berhasil');
      console.log(data);
      window.open(data['url'],'_blank');
      $('a[value="'+email+'"]').removeClass('btn-warning btn-success').addClass('btn-primary');
      $('p[value="'+email+'"]').removeClass('text-warning text-success').addClass('text-primary');
      $('p[value="'+email+'"]').text('Viewed');

    }
  }).fail(function (xhr, error, thrownError) {
    console.log(xhr, error, thrownError);
  });




}

$(document).ready(function(){

  $('#rank-table').DataTable();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#save-comment').click(function(event){
    res = $('#edit-comment').val();
    data_send = JSON.stringify(
      {
        "job_id" : $('meta[name="job-id"]').attr('content'),
        "email": $('#save-comment').val(),
        "comment": res
      }
    );
    $.ajax({
      url: '/job/edit_comment',
      type: 'POST',
      data: {data_send},
      success: function (data) {
        $('td[value="'+$('#save-comment').val()+'"] p').text(res);
        $('#modal-comment').slideUp();
        $(".modal-backdrop").slideUp();
      }
    }).fail(function (xhr, error, thrownError) {
    console.log(xhr, error, thrownError);
    });

  });

//not used
  // $('#submit-change').click(function(event){
  //   data_send = JSON.stringify({"data" : $('#rank-table').DataTable().rows().data()});
  //   $.ajax({
  //     url: '/job/update_rank',
  //     type: 'post',
  //     data: {data_send},
  //     success: function (data) {
  //     }
  //   }).fail(function (xhr, error, thrownError) {
  //   console.log(xhr, error, thrownError);
  //   });
  // });





});
