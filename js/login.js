jQuery(document).ready(function() {
  // Login form submit event handler
  jQuery('#login-form').on('submit', function(event) {
    event.preventDefault();

    // Get form data
    var email = jQuery('#email').val();
    var password = jQuery('#password').val();

    // Send form data to server using AJAX
    jQuery.ajax({
      type: 'POST',
      url: 'php/login.php',
      data: {
        email: email,
        password: password
      },
      dataType: 'json',
      success: function(response) {
        console.log(response)

        if (response.success) {
          // Login successful, store session data in local storage
          localStorage.setItem('email', response.email);
          localStorage.setItem('logged_in', true);

          // Redirect to profile page
          window.location.href = 'profile.html';
        } else {
          // Login failed, display error message\
          console.log(jqXHR.responseText);
          jQuery('#error-message').text(response.error);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert("Error logging in. Please try again later.");
      }
    });
  });
});


