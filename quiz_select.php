<h1 class='selectH'>Select your quiz</h1><br>
<ul>
<?php
require 'includes/dbh.inc.php';
if($_SESSION['permiss'] == 1) {
    echo "<li><a href='index.php?page=1'><button style='font-size:25pt; width:auto;' class='btn btn-outline-dark btn-block'>Dasboard</button></a></li>";
    echo "<li><a href='index.php?page=2'><button style='font-size:25pt; width:auto;' class='btn btn-outline-dark btn-block'>CreateQuiz</button></a></li>";
}else {
    $quizName = $conn->query("SELECT * FROM quiz");
    $user = $_SESSION['userId'];

    while($row = $quizName->fetch_assoc()) {
        $idQ = $row["idQuiz"];
        echo "<li><a href='index.php?page=".$row["idQuiz"]."'><button style='font-size:25pt; width:auto;' class='btn btn-outline-dark btn-block'>" . $row["quiz"]. "</button></a></li>";
    }
    //Pitää korjata, jotta pisteet näkyisivät kun vastaukset on lähetetty, 
    //samalla estää quizin avaamisen uusiksi
}

?>



