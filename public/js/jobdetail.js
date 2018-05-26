$(document).ready(function(){

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

});
