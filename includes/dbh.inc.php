<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phplogin";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connction failed: ".mysqli_connect_error());
}