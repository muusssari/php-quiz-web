<?php
require 'dbh.inc.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $quiz = $conn->query("SELECT * FROM quiz");
    
        while($row = $quiz->fetch_assoc()) {
            echo "<div class='card' style='background-color:#EEEEEE!important;'><div class='card-content'><h3>Quiz Name: <b style='font-size:25pt;'>" . $row['quiz'] . "</b>";
            $scores = 0;
            $done = false;
            $qID = $row['idQuiz'];
            $collect = $conn->query("SELECT * FROM collect WHERE idQuiz=$qID");
            while($row = $collect->fetch_assoc()) {
                $idQ = $row['idQuestion'];
                $ans = $conn->query("SELECT * FROM userAns WHERE idQuestion=$idQ AND idUsers=$id");
                while($row = $ans->fetch_assoc()) {
                    $scores += $row['points'];
                    if($row['submit'] == 1) {
                        $done = true;
                    }else {
                        $done = false;
                    }
                }
            }
            if($done == 1){
                echo "&nbsp; <span style='background-color: green; border-radius:3px; color:white; padding:4px;float:right;'> Done! <span></h3><br>";
            }else {
                echo "&nbsp; <span style='background-color: red; border-radius:3px; color:white; padding:4px;float:right;'> Not done! <span></h3><br>";
            }
            
            echo "<h5>Scores: &nbsp;<b style='font-size:25pt;'>" . $scores . "</b></h5></div></div><br>";
        }
}
?>