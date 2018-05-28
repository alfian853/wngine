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
          console.log(response);
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

    console.log($('#edit-description').text());
    // $.ajax({
    //   url: "job/edit_description/"+$('#job-id').val(),
    //   type: 'POST',
    //   data: {},
    //   success: function (response) {
    //      if(response['status'] == 'success'){
    //         $("button[data-target='#modal-take']").slideUp();
    //         $("#modal-take").hide();
    //         $(".modal-backdrop").hide();
    //      }
    //      alert(response['message']);
    //   }
    // }).fail(function (xhr, error, thrownError) {
    //     alert('something wrong :(');
    // });

  });


});
