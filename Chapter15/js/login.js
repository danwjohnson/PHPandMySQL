// Script 15.10 - login.js
// This script is included by login.php
// This script handles and validates the form submission.
// This script then makes an Ajax request of login_ajax.php.

// Do something when the document is ready:
$(function() {
   
   // Hide all error messages:
   $('.errorMessage').hide();
   
   // Assign an event handler to the form:
   $('#login').submit(function() {
    
        // Initialize some variables:
        var email, password;
        
        // Validate the email address:
        if ($('#email').val().length >= 6) {
            
            // Get the email address
            email = $('#email').val();
            
            // Clear and error, if one existed:
            $('#emailP').removeClass('error');
            
            // Hide the message, if one was visible:
            $('#emailError').hide();
            
        } else {    // Invalid email address
            
            // Add an error class:
            $('#emailP').addClass('error');
            
            // Show the error message
            $('#emailError').show();
            
        }  // end of email validation
        
        // Validate the password
        if ($('#password').val().length > 0) {
            
            password = $('#password').val();
            
            $('#passwordP').removeClass('error');
            
            $('#passwordError').hide();
            
        } else {
            
            $('#passwordP').addClass('error');
            
            $('#passwordError').show();
            
        } // end of password validation
        
        // If appropriate, perform the Ajax request
        if (email && password) {
            
            // Create an object for the form data:
            var data = new Object();
            data.email = email;
            data.password = password;
            
            // Create an object of Ajax options:
            var options = new Object();
            
            // Establish each setting
            options.data = data;
            options.dataType = 'text';
            options.type = 'get';
            options.success = function(response) {
                
                // Worked:
                if (response == 'CORRECT') {
                    
                    // Hide the form:
                    $('#login').hide();
                    
                    // Show a message:
                    $('#results').removeClass('error');
                    $('#results').text('You are now logged in');
                    
                } else if (response == 'INCORRECT') {
                    
                    $('#results').text('The submitted credentials do not match thos on file!');
                    $('#results').addClass('error');
                    
                } else if (response == 'INCOMPLETE') {
                    
                    $('#results').text('Please provide an email address and a password.');
                    $('#results').addClass('error');
                    
                } else if (response == 'INVALID_EMAIL') {
                    
                    $('#results').text('Please provide your email address!');
                    $('#results').addClass('error');
                    
                }
                
            };  // End of success
            options.url = 'login_ajax.php';
            
            // Perform the request:
            $.ajax(options);
            
        }   // End of email && password IF.
        
        // Return false to prevent an actual form submission:
        return false;
    
   });  // end of form submission
    
}); // end of document ready