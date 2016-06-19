<?php

$servername = "127.0.0.1";
$username = "app_usr";
$password = "password";
$dbname = "demodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE visitor SET count = count + 1";  
$result = mysqli_query($conn, $sql);

$sql = "SELECT count FROM visitor";
$result = mysqli_query($conn, $sql);

echo $result->fetch_row()[0];

mysqli_close($conn);
?>


