<?php
require 'dbh.inc.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $quiz = $conn->query("SELECT * FROM quiz");
    
    $student = $conn->query("SELECT * FROM userAns WHERE idUsers=$id");
    //$number=mysqli_num_rows($quiz);
    for($x = 0; $x < 20; $x++) {
        while($row = $quiz->fetch_assoc()) {
            echo "<h3>Quiz Name: " . $row['quiz'];
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
                echo " Done </h3><br>";
            }else {
                echo "</h3><br>";
            }
            
            echo "<h5>Scores: " . $scores . "</h5><br>";
        }
    }
}
?>