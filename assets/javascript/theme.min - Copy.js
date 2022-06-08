$(document).ready(function(){

    // Log in User
    $(document).on('submit','form.auth-form',function(e){  
        e.preventDefault(); 
       
      $.ajax({
        url: BASE_URL + 'login/login',
        type: 'POST',  
        data: $('form.auth-form').serialize(),
        dataType: 'JSON',
        success: function(data){
            if(data.response){
                location.reload();
            }else{
                
            }
        },
        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      }); 
  
    }); 
  
});