<?php
session_start();

$conn = new mysqli("localhost", "root", "", "database1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {

    $users = $_POST['username'];
    $pass  = $_POST['password'];

    $query = "INSERT INTO users (users, pass) VALUES ('$users', '$pass')";

    if ($conn->query($query) === TRUE) {
        echo "Inserted successfully";

    } else {
        echo "SQL Error: " . $conn->error;
    }
} else {
    echo "POST data missing";
}
$result = $conn->query("SELECT * FROM users");

while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Username: " . $row['users'] . "<br>";
    echo "Password: " . $row['pass'] . "<hr>";
}
?>
