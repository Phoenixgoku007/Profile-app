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

// Fetch user's profile information from the database
$email = $_SESSION['email'];
$query = "SELECT name, email, age, dob, contact FROM users WHERE email='$email'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Store user's profile information in the session data
  $_SESSION['name'] = $row['name'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['age'] = $row['age'];
  $_SESSION['dob'] = $row['dob'];
  $_SESSION['contact'] = $row['contact'];

  // Create JSON response with user's profile information
  $response = array(
    'success' => true,
    'name' => $row['name'],
    'email' => $row['email'],
    'age' => $row['age'],
    'dob' => $row['dob'],
    'contact' => $row['contact']
  );

  echo json_encode($response);
} else {
  $response = array('success' => false, 'error' => 'No profile found for the user');
  echo json_encode($response);
}
?>
