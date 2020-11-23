<?php
$servername = "sql207.epizy.com";
$username = "epiz_26897009";
$password = "B9ro1Mo3Uu";
$dbName = "epiz_26897009_Unique";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>