
<ul>
<?php
require 'includes/dbh.inc.php';
if($_SESSION['permiss'] == 1) {
    echo "<h1 class='selectH'>What to do</h1><br>";
    echo "<li><a href='index.php?page=1'><button style='font-size:25pt;' class='btn btn-outline-dark btn-block'>Dashboard</button></a></li>";
    echo "<li><a href='index.php?page=2'><button style='font-size:25pt;' class='btn btn-outline-dark btn-block'>Create quiz</button></a></li>";
}else {
    $quizName = $conn->query("SELECT * FROM quiz");
    $user = $_SESSION['userId'];
    echo "<h1 class='selectH'>Select your quiz</h1><br>";

    while($row = $quizName->fetch_assoc()) {
        $idQ = $row["idQuiz"];
        $qName = $row["quiz"];
        $done = false;
        $collect = $conn->query("SELECT * FROM collect WHERE idQuiz=$idQ");
        while($row = $collect->fetch_assoc()) {

            $coll = $row["idQuestion"];
            $ans = $conn->query("SELECT * FROM userAns WHERE idUsers=$user AND idQuestion=$coll");
                while($row = $ans->fetch_assoc()) {
                    $s = $row['submit'];
                    echo "<script>console.log( 'Debug Objects 2: " . $s . "' );</script>";
                    if($s== 1){
                        $done = true;
                    }else {
                        $done = false;
                    }
                    
                }
            
            
        }
        if($done) {
            echo "<li><a><button style='font-size:25pt;' class='btn btn-outline-dark btn-block'>DONE</button></a></li>";
        }else {
            echo "<li><a href='index.php?page=".$idQ."'><button style='font-size:25pt;' class='btn btn-outline-dark btn-block'>" . $qName. "</button></a></li>";
        }  
    }
    //Pitää korjata, jotta pisteet näkyisivät kun vastaukset on lähetetty, 
    //samalla estää quizin avaamisen uusiksi
}

?>



