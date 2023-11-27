<?php

$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "bare_vifter";

$conn = mysqli_connect($server, $user, $pw, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

mysqli_close($conn);
?>
