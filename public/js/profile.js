$(document).ready(function(){

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

    $('#submit-name').click(function(){
      data_send = JSON.stringify({"new_nickname" : $('#name-input').val()});
      console.log(data_send);
      $.ajax({
        url: "change_name/",
        type: 'POST',
        data: {data_send},
        success: function (response) {
          if(response['status'] == 'success'){
           $('#username').text($('#name-input').val());
          }
          alert(response['message']);
          $('#dismiss-change-name').trigger('click');

        }
      }).fail(function (xhr, error, thrownError) {
          alert('something wrong :(');
      });

    });


    $('#submit-quote').click(function(){
      data_send = JSON.stringify({"new_quote" : $('#edit-quote').val()});
      console.log(data_send);
      $.ajax({
        url: "change_quote/",
        type: 'POST',
        data: {data_send},
        success: function (response) {
          if(response['status'] == 'success'){
           $('#id-quote').text($('#edit-quote').val());
          }
          alert(response['message']);
          $('#dismiss-quote').trigger('click');

        }
      }).fail(function (xhr, error, thrownError) {
          alert('something wrong :(');
      });

    });
    $('#submit-testimoni').click(function(){
      data_send = JSON.stringify({"new_testimoni" : $('#edit-testimoni').val()});
      console.log($('meta[name="member-id"]').attr('content'));
      $.ajax({
        url: "/company/job/add_member_testimony/"+$('meta[name="member-id"]').attr('content'),
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
