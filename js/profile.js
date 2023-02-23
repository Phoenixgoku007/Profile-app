jQuery(document).ready(function() {
  // Get user's profile information from server using AJAX
  jQuery.ajax({
    type: 'GET',
    url: 'php/profile.php',
    success: function(response) {
      var data = JSON.parse(response);

      // Set user's profile information on page
      jQuery('#name').text(data.name);
      jQuery('#email').text(data.email);
      jQuery('#age').text(data.age);
      jQuery('#dob').text(data.dob);
      jQuery('#contact').text(data.contact);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
      alert("Error getting profile information. Please try again later.");
    }
  });

  // Logout button click event handler
  jQuery('#logout-btn').on('click', function(event) {
    event.preventDefault();

    // Delete session data from server
    jQuery.ajax({
      type: 'POST',
      url: 'php/logout.php',
      success: function(response) {
        // Redirect to login page
        window.location.href = 'login.html';
      }
    });
  });
});
