<?php
session_start();
require 'dbh.inc.php';
//Tarkistaa tiedot ja palaa quiz valikkoon

$questions = $conn->query("SELECT * FROM questions");
while($row = $questions->fetch_assoc()) {
    $num = $row["idQuestion"];
    $_GET[$num];
}

//header("Location: ../index.php");
?>