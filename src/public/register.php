<?php
$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "bare_vifter";

$conn = mysqli_connect($server, $user, $pw, $db);

$insertQuery = "INSERT INTO customers (CustomerID, FirstName, LastName, Email, PasswordHash) 
                VALUES (NULL, '$firstName', '$lastName', '$email', '$password')";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $insertQuery = "INSERT INTO customers (FirstName, LastName, Email, PasswordHash) 
                    VALUES ('$firstName', '$lastName', '$email', '$password')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
