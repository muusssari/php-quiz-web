<h1 class='selectH'>Select your quiz</h1><br>
<ul>
<?php
require 'includes/dbh.inc.php';
$quizName = $conn->query("SELECT * FROM quiz");

while($row = $quizName->fetch_assoc()) {
    echo "<li><a href='index.php?page=".$row["idQuiz"]."'><button style='font-size:25pt; width:auto;' class='btn btn-outline-dark btn-block'>" . $row["quiz"]. "</button></a></li>";
}
?>



