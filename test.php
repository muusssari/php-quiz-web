<?php
session_start();
// testausta varten
$qname = $_POST['name'];
$qval = $_POST['val'];
$_SESSION[$qname] = $qval;
echo "<script>console.log( 'Debug Objects:".$_SESSION[$qname]. "' );</script>";
?>