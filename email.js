$(document).ready(function(){
    $('#emailForm').submit(function(event){
        event.preventDefault(); 
        var formData = $(this).serialize(); 
        $.ajax({
            type: 'POST',
            url: 'email.php', 
            data: formData,
            success: function(response){
                
                var responseData = JSON.parse(response);               

                if (responseData.success) {                   
                    $('#success-response').addClass('show');
                     $('#success-message').text(responseData.message);
                    $('#emailForm')[0].reset();
                    setTimeout(function() {
                        $('#success-response').removeClass('show');
                    }, 5000);
                } else {
                    $('#response').text(responseData.message).addClass('error');
                    $('#response-message').text("An error occurred: " + responseData.message);
                    $('#error-response').addClass('show');
                    setTimeout(function() {
                        $('#error-response').removeClass('show');
                    }, 5000);

                }
            }
            ,
            error: function(xhr, status, error) {
                console.error("Error:", error);
                $('#error-message').text("An error occurred while processing your request.").addClass('error');
                $('#error-response').addClass('show');
                setTimeout(function() {
                    $('#error-response').removeClass('show');
                }, 5000);
            }
        });
    });
});