
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
        echo "<li><a href='index.php?page=".$row["idQuiz"]."'><button style='font-size:25pt;' class='btn btn-outline-dark btn-block'>" . $row["quiz"]. "</button></a></li>";
    }
    //Pitää korjata, jotta pisteet näkyisivät kun vastaukset on lähetetty, 
    //samalla estää quizin avaamisen uusiksi
}

?>



