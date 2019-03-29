<?php
require 'includes/dbh.inc.php';
echo "<script>console.log( 'start' );</script>";
$num=$_GET['page'];
$user = $conn->query("SELECT * FROM users");
$quizName = $conn->query("SELECT quiz FROM quiz WHERE idQuiz=$num");
$collect = $conn->query("SELECT idQuestion FROM collect WHERE idQuiz=$num");
$quizNums = '';
while($row = $collect->fetch_assoc()){
    $quizNums .="idQuestion=". $row["idQuestion"] ." OR ";
}
$quizNums .= "0";

$questions = $conn->query("SELECT idQuestion, question, qType FROM questions WHERE $quizNums");




/*
while($row = $user->fetch_assoc()) {
    echo "id: " . $row["idUsers"]. " - Name: " . $row["uidUsers"]. " " . $row["pwdUsers"]. "<br>";
}*/


if(isset($_SESSION['name'])){
    echo "this:".$_SESSION['name'];
}
$messures=array(' '=>1, 'μm'=>2,'mm'=>3,'cm'=>4,'dm'=>5,'mg'=>6,'kg'=>7);
$options='';
echo '<form action='.$_SERVER["PHP_SELF"].' method="POST">';
echo "<label>";
while($row = $quizName->fetch_assoc()) {
    echo "<h1>" . $row["quiz"]. "</h1>";
    
    //Luo niin monta tehtävää kun databasesta löytyy
    while($row = $questions->fetch_assoc()) {
        $quizNum = "";
        $quizNum = "q" .$row["idQuestion"];
        echo $row["idQuestion"];
        if(isset($_SESSION[$quizNum])){
            $selected = $_SESSION[$quizNum];
            echo $_SESSION[$quizNum];
        }else {
            $selected=' ';
        }
        
        
        echo "<h1>" . $row["question"]. "</h1>";
        echo "<input type='text'  name=". $quizNum ." size='4' onchange='chkinput(this.value, $quizNum);' >";
        if($row["qType"] == 1) {

            //echo "<script>console.log( 'Debug Objects:". $selected . "' );</script>";
            echo "<select name='". $quizNum."' onchange='chk(this.value, $quizNum);'>";
            foreach($messures as $k => $v)
            {
                if($selected==$v) {
                    $options.="<option value='".$selected."' selected>".$k."</option>";
                    //echo "<script>console.log( 'Debug Objects:". $selected . "' );</script>";
                }else {
                    $options.="<option value='".$v."'>".$k."</option>";
                }
            }
            $selected=' ';
            echo $options;
        echo "</select>";
        }
    }
}
echo "</label>";
echo "<a href='includes/quiz.inc.php'><button type='submit' class='btn btn-primary btn-block'>Submit</button></a>";
//menee quiz.inc.php  tarkistamaan vastaukset ja (ei toimi vielä) lukitsee 1 osion ja tarkistaa että kaikkiin on vastattu. 
echo "</form>";


?>