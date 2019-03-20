<?php
require 'includes/dbh.inc.php';
$quiz = $conn->query("SELECT * FROM users");

while($row = $quiz->fetch_assoc()) {
    echo "id: " . $row["idUsers"]. " - Name: " . $row["uidUsers"]. " " . $row["pwdUsers"]. "<br>";
}
?>