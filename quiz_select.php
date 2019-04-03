<h1>Select your quiz</h1><br>
<ul>
<?php
require 'includes/dbh.inc.php';
$quizName = $conn->query("SELECT * FROM quiz");

while($row = $quizName->fetch_assoc()) {
    echo "<li><a href='index.php?page=".$row["idQuiz"]."'><button class='btn btn-outline-light btn-block'>" . $row["quiz"]. "</button></a></li>";
}
?>



