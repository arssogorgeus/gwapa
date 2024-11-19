<?php
// Database connection settings
$host = 'localhost';
$dbname = 'registration_db';
$username = 'username';  // replace with your MySQL username
$password = 'password';  // replace with your MySQL password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

// Insert data into the database
$sql = "INSERT INTO users (firstname, middlename, lastname, age, birthdate, email, password) 
        VALUES ('$firstname', '$middlename', '$lastname', $age, '$birthdate', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
