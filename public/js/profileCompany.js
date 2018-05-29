$(document).ready(function()
{
    $("#t1").click(function()
    {
        $("#s1").slideToggle("slow");
    });
    $("#t2").click(function()
    {
        $("#s2").slideToggle("slow");
    });
    $("#t3").click(function()
    {
        $("#s3").slideToggle("slow");
    });
    $("#t4").click(function()
    {
        $("#s4").slideToggle("slow");
    });
    $("#t5").click(function()
    {
        $("#s5").slideToggle("slow");
    });
    $("#t6").click(function()
    {
        $("#s6").slideToggle("slow");
    });
    $("#t7").click(function()
    {
        $("#s7").slideToggle("slow");
    });
    $("#t8").click(function()
    {
        $("#s8").slideToggle("slow");
    });

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

    $('#submit-testimoni').click(function(){
      data_send = JSON.stringify({"new_testimoni" : $('#edit-testimoni').val()});
      console.log($('meta[name="company-id"]').attr('content'));
      $.ajax({
        url: "/member/job/add_company_testimony/"+$('meta[name="company-id"]').attr('content'),
        type: 'POST',
        data: {data_send},
        success: function (response) {
          alert(response['message']);
          $('#dismiss-testimoni').trigger('click');
        }
      }).fail(function (xhr, error, thrownError) {
          alert('something wrong :(');
      });

    });

});
