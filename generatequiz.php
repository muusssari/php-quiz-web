<?php
require 'includes/dbh.inc.php';
$user = $conn->query("SELECT * FROM users");
$quizName = $conn->query("SELECT quiz FROM quiz");
$questions = $conn->query("SELECT question FROM questions");

while($row = $user->fetch_assoc()) {
    echo "id: " . $row["idUsers"]. " - Name: " . $row["uidUsers"]. " " . $row["pwdUsers"]. "<br>";
}
echo "<div class='middle' id='content' style='height:30px;'>";

echo "<label>";
while($row = $quizName->fetch_assoc()) {
    echo "<h1>" . $row["quiz"]. "</h1>";
}
while($row = $questions->fetch_assoc()) {
    echo "<h1>" . $row["question"]. "</h1>";
    echo "<input type='text' size='4'>
    <select>
    <option value=''></option>
      <option value='μm'>μm</option>
      <option value='mm'>mm</option>
      <option value='cm'>cm</option>
      <option value='dm'>dm</option>
      <option value='mg'>mg</option>
      <option value=''>kg</option>
    </select>";
}
echo "</label>";
echo "<a href='index.php'><button type='submit' class='btn btn-primary btn-block'>Submit</button></a>";
echo "</div>";
?>