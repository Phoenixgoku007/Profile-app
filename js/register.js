jQuery(document).ready(function() {
  // Register form submit event handler
  jQuery('#register-form').on('submit', function(event) {
    event.preventDefault();

    // Get form data
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var age = jQuery('#age').val();
    var dob = jQuery('#dob').val();
    var contact = jQuery('#contact').val();
    var password = jQuery('#password').val();

    // Send form data to server using AJAX
    jQuery.ajax({
      type: 'POST',
      url: 'php/register.php',
      data: {
        name: name,
        email: email,
        age: age,
        dob: dob,
        contact: contact,
        password: password
      },
      success: function(response) {
        var data = JSON.parse(response);

        if (data.success) {
          // Registration successful, redirect to login page
          window.location.href = 'login.html';
        } else {
          // Registration failed, display error message
          jQuery('#error-message').text(data.error);
        }
      }
    });
  });
});
