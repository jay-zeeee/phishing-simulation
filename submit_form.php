<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lznk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$nric = $_POST['nric'];
$staff_id = $_POST['staff_id'];
$division = $_POST['division'];
$position = $_POST['position'];
$phone_number = $_POST['phone_number'];

// Check if staff_id already exists
$query = "SELECT id FROM staff_info WHERE staff_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $staff_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Staff ID already exists, handle the error
    $stmt->close();
    $conn->close();
    die("Error: The Staff ID '$staff_id' has already been claimed. You cannot claim again.");
}

$stmt->close();

// Insert the new record
$stmt = $conn->prepare("INSERT INTO staff_info (name, nric, staff_id, division, position, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}
$stmt->bind_param("ssssss", $name, $nric, $staff_id, $division, $position, $phone_number);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to thank_you.html after successful submission
    header("Location: thank_you.html");
    exit(); // Make sure to exit after the redirect to stop script execution
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
