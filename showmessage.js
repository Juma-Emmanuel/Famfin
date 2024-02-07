function showError(message) {
    var snackbar = document.getElementById("snackbar");
    snackbar.textContent = message;
    snackbar.className = "show";
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
}
var urlParams = new URLSearchParams(window.location.search);
var errorMessage = urlParams.get('error');

if (errorMessage) {
    showError(errorMessage, 'error');
    } 

    function showSuccess(message) {
        var snackbar = document.getElementById("success-snackbar");
        snackbar.textContent = message;
        snackbar.className = "show";
        setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 6000);
    }
    var urlParams = new URLSearchParams(window.location.search);
    
    var successMessage = urlParams.get('success');
    if (successMessage) {
        showSuccess(successMessage, 'success');
        }  

        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_Password").value;
            var error = document.getElementById("error");

            
            if (password !== confirmPassword) {
                error.textContent = "Passwords do not match";
                return false; 
            } else {
                error.textContent = ""; 
            }
            return true; 
        }
        