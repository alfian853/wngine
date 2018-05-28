$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    Dropzone.options.changePict = {
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
              $('#profile-pict').attr('src',response['newpath']);
              $('#dismiss-modal-pict').trigger('click');
            }
            else{

            }

          });
        }
    };
});
