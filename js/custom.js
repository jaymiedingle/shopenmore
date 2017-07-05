$(function(){


  $("#files").change(function(){
    methods.img_preview(this);
  });

  $("#registration, #profile-form").submit(function(e){
    
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();

    if(password != confirm_password){
      e.preventDefault();
      //alert("Password do not match");
      $(".password-error-wrap").html('Passwords do not match');
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
  }
}