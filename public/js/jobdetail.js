$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  Dropzone.options.submitJob = {
      headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } ,
      maxFiles : 1,
      init : function() {
        myDropzone = this;
        var prevFile = null;
        this.on("addedfile", function(file) {
          if(prevFile != null){
            this.removeFile(prevFile);
          }
            prevFile = file;
        });
        this.on('success',function(file,response){//success get response
          // console.log(response);
          if(response['status'] == "success"){
            $('#submit-name').text("File name: "+prevFile['upload']['filename']);
            $('#submit-time').text("Last submission: "+response['message']);
          }
          else{

          }

        });
      }
  };

  $('#save-description').click(function(event){

    var data_send = JSON.stringify({
            "new_description": $('#edit-description').val()
    });
    // console.log();
    $.ajax({
      url: "/job/edit_description/"+$('#job-id').val(),
      type: 'POST',
      data: {data_send},
      success: function (response) {
        // console.log(response);
         if(response['status'] == 'success'){
           $('#jobDesc').text($('#edit-description').val());
         }
         alert(response['message']);
         $('#dismiss-modal-desc').trigger('click');
      }
    }).fail(function (xhr, error, thrownError) {
        alert('something wrong :(');
    });

  });


});
