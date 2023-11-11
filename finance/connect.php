<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'login');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Registration successful.";
        } else {
            echo "Error during registration: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in prepared statement: " . $conn->error;
    }

    $conn->close();
}
?>