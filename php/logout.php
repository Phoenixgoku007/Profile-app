<?php
session_start();

// Destroy session data
session_unset();
session_destroy();

// Return success message
echo json_encode(array('success' => true));
header('Location: ../index.html');
?>
