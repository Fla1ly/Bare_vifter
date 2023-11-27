<?php
session_start();

$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "bare_vifter";

$conn = mysqli_connect($server, $user, $pw, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $query = "SELECT * FROM customers WHERE Email = '$email' AND PasswordHash = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['CustomerID'];
        $_SESSION['user_name'] = $user['FirstName'];

        header("Location: user.php");
        exit();
    } else {
        echo "Feil email eller passord!";
    }
}

mysqli_close($conn);
?>
