
<?php

$servername = "localhost";
$databasename = "custon_fo4";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>