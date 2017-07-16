$(function(){

  methods.show_alert();
      

  /*rating event*/
  $('input[name=rate]').change(function(){
        $('#rateform').submit();
   });

  /*update active*/
  $(".slider").on('click', function(){
    methods.activate_update(this);
  });

  $("#files").change(function(){
    methods.img_preview(this);
  });

  $("#registration, #profile-form").submit(function(e){
    
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();

    if(password != confirm_password){
      e.preventDefault();
      alert("Password do not match");
    }


  });
  
});

var methods = {

  img_preview: function(elem){

      var reader = new FileReader();
      reader.onload = function (e) {
          // get loaded data and render thumbnail.
          $("#image").attr('src', e.target.result);
      };

      // read the image file as a data URL.
      reader.readAsDataURL(elem.files[0]);
  },

  activate_update: function(elem){

    var this_elem = $(elem);
    var checkbox = this_elem.closest('label').find('[type=checkbox]');

    var data = {
      table : checkbox.prop('class'),
      id : checkbox.prop('alt'),
      update_field : 'is_active',
      update_value : (checkbox.prop('checked')) ? 0 : 1
    }

     $.ajax({
        url: "custom_update.php",
        type: "post",
        data: data ,
        success: function (response) {
           $(".alert-dismissible").hide();     

          $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
              $(".alert-dismissible").slideUp(500);
          }); 
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });

  },

  show_alert: function(){

     $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
      $(".alert-dismissible").slideUp(500);

      var site_path =  window.location.origin + '/shopenmore/';

      console.log(site_path + "error_session_resetter.php");

        $.ajax({
          url: site_path + "error_session_resetter.php",
          type: "post",
          success: function (response) {
             console.log(response);
          }
         }); 

    }); 
  }

  

}