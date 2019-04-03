<?php
if(!isset($_SESSION['userId'])) {
    header("Location: home.php?permission=false");
}
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

if(isset($_SESSION['name'])){
    echo "this:".$_SESSION['name'];
}
$messures=array('Value'=>1, 'μm'=>2,'mm'=>3,'cm'=>4,'dm'=>5,'mg'=>6,'kg'=>7);
$options='';
echo '<form action="includes/quiz.inc.php" method="POST">';
echo "<label>";
while($row = $quizName->fetch_assoc()) {
    echo "<h2>" . $row["quiz"]. "</h2>";
    
    //Luo niin monta tehtävää kun databasesta löytyy
    while($row = $questions->fetch_assoc()) {
        $_SESSION['idQuestion']=$row["idQuestion"];
        $quizNum = "";
        $quizNum = "q" .$row["idQuestion"];
        $quizNumInput = "";
        $quizNumInput = "i".$row["idQuestion"];
        //echo $quizNum;
        if(isset($_SESSION[$quizNum])){
            $selected = $_SESSION[$quizNum];
        }else {
            $selected=' ';
        }
//--------------------------------------------------------------------------
        echo "<label><br>" . $row["question"]. "</label>";

        if(isset($_SESSION[$quizNumInput])){
            echo "<input  class='form-control form-control-genquiz' type='text'  name=". $quizNumInput ." size='4' value='".$_SESSION[$quizNumInput]."' onchange='chkinput(this.value, $quizNumInput);' >";
        }else {
            echo "<input  class='form-control form-control-genquiz' type='text'  name=". $quizNumInput ." size='4' onchange='chkinput(this.value, $quizNumInput);' >";
        }
        
        if($row["qType"] == 1) {

            echo "<select class='form-control form-control-genquiz' name='". $quizNum."' onchange='chk(this.value, $quizNum);'>";
            $options = '';
            foreach($messures as $k => $v)
            {
                if($selected==$v) {
                    $options.="<option value='".$selected."' selected>".$k."</option>";
                }else {
                    $options.="<option value='".$v."'>".$k."</option>";
                }
            }
            $selected="";
            echo $options;
        echo "</select>";
        }
    }
}
echo "</label>";
echo "<button type='submit' name='save' class='btn btn-primary btn-block'>Submit</button>";
//menee quiz.inc.php  tarkistamaan vastaukset ja (ei toimi vielä) lukitsee 1 osion ja tarkistaa että kaikkiin on vastattu. 
echo "</form>";

?>