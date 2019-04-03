<?php
session_start();
require 'dbh.inc.php';
//Tarkistaa tiedot ja palaa quiz valikkoon
if(isset($_POST['save'])) {
    $values;
    $name = "";
    for ($x = 1; $x <= 40; $x++) {
        $name = "i" . strval($x);
        if(isset($_POST[$name])){
            $values .= "The name is: $name and value: $_POST[$name] <br>";
        }
        $name = "q" . strval($x);
        if(isset($_POST[$name])){
            $values .= "The name is: $name and value: $_POST[$name] <br>";
        }
    }
    echo $values;
}else {
    echo "<h1>empty</h1>";
}

header("Location: ../index.php");
?>