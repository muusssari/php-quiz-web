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
        $scores = checkPoints($x, $conn, $valueInput, $valueDrop);
        if($valueInput != "") {
            $sql = "INSERT INTO userAns (userAns,userAnsQ, idQuestion, idUsers, submit, points)
                        VALUES ('$valueInput','$valueDrop', '$x', '$s', true, '$scores')";
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

function checkPoints($idQ, $conn, $valueInput, $valueDrop) {
    $points = 0;
    $question = $conn->query("SELECT * FROM questions WHERE idQuestion=$idQ");
    while($row = $question->fetch_assoc()) {
        if($valueInput != "") {
            $subname = $row["rightAns"];
            if($valueInput == $row["rightAns"]) {
                $points .= 1;
            }
            if($row["rightAnsQ"] != null || $row["rightAnsQ"] != "") {
                if($valueDrop == $row["rightAnsQ"]){
                    $points .= 1;
                }
            }   
        }
    }
    return $points; //pisteet oikeista vastauksista
} //input 1 piste ja drop downista 1piste, mutta jos input väärin, dropista saa 0
//header("Location: ../index.php");

?>