$(document).ready(function() {

    $('#take-job').click( function(event) {
        if(document.getElementById('tc-checkbox').checked == true){
            var param = JSON.stringify({"job_id" : $('#job-id').val()});
            $.ajax({
              url: '/job/take_job',
              type: 'POST',
              data: { _token : $('input[name="_token"]').val(), param  },
              success: function (response) {
                 if(response['status'] == 'success'){
                    $("button[data-target='#modal-take']").slideUp();
                    $("#modal-take").modal('toggle');
                 }
                 alert(response['message']);
              }
            }).fail(function (xhr, error, thrownError) {
                alert('something wrong :(');
            });

        }
        else{
            alert('please agree the terms and conditions');
        }

    });


});
