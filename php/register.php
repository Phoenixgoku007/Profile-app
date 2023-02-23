<?php
// Establish database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'profile_app';

$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check for database connection errors
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize user input to prevent SQL injection
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
$contact = mysqli_real_escape_string($mysqli, $_POST['contact']);

$sql = "INSERT INTO users (name, email, password, age, dob, contact) VALUES ('$name', '$email', '$password', '$age', '$dob', '$contact')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
