<?php
session_start();

// Connect to the MySQL database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'profile_app';

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for errors
if ($mysqli->connect_errno) {
  $response = array('success' => false, 'error' => 'Failed to connect to MySQL: ' . $mysqli->connect_error);
  echo json_encode($response);
  exit();
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check if user exists in the database
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
  // User exists, set session data
  $_SESSION['email'] = $email;
  $_SESSION['logged_in'] = true;

  $response = array('success' => true);
  echo json_encode($response);
} else {
  // User does not exist or password is incorrect
  $response = array('success' => false, 'error' => 'Invalid email or password');
  echo json_encode($response);
}

// Close database connection
$mysqli->close();
?>
