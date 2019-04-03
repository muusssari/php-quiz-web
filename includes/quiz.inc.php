<?php
session_start();
require 'dbh.inc.php';
//Tarkistaa tiedot ja palaa quiz valikkoon
if(isset($_POST['save'])) {
    $s = $_SESSION['userId'];
    $name = "";
    for ($x = 1; $x <= 40; $x++) {
        $valueInput = "";
        $valueDrop = "";
        $name = "";
        $name = "i" . strval($x);
        if(isset($_POST[$name])){
            $valueInput .= $_POST[$name];
        }
        $name = "q" . strval($x);
        if(isset($_POST[$name])){
            $valueDrop .= $_POST[$name];
        }
        if($valueInput != "") {
            $sql = "INSERT INTO userAns (userAns,userAnsQ, idQuestion, idUsers, submit)
                        VALUES ('$valueInput','$valueDrop', '$x', '$s', true)";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    }
    
    
}else {
    //echo "<h1>empty</h1>";
}

//header("Location: ../index.php");
?>