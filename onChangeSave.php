<?php
// testausta varten
session_start();
$qname = $_POST['name'];
$qval = $_POST['val'];
$_SESSION[$qname] = $qval;
?>