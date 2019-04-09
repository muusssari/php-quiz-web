<?php
if(!isset($_SESSION['userId'])) {
    header("Location: home.php?permission=false");
}
require 'includes/dbh.inc.php';
?>


<?php
//Quiz valita
$num=$_GET['page'];
$quizSubName = $conn->query("SELECT * FROM quiz WHERE idQuiz=$num");
//Valitaan subi jonka alta etsitään oikeat kysymykset
$collect = $conn->query("SELECT idSub FROM collect WHERE idQuiz=$num");
$subID=0;//koska databasen index alkaa 1
$lowID=100;//otetaan alin subid
while($row = $collect->fetch_assoc()) {
    if($lowID > $row["idSub"]) {
        $lowID = $row["idSub"]; //kun ensimmäinen id on 1 seuraava on 2 joten tallennetaan 1
    }
    $subID = $row["idSub"];//Ottaa isoimman numeron listasta, joka päättää kuinka monta subnamea quizilla on
}
//Koska subid on isoin numero mikä löytyy collectionista, esim 4, voimme for loopata 4 asti.
//Syötetään haluttu subnumero ja palautetaan lista kysymyksistä sen alla.
function getQuestions($conn,$subID) {
    $collectQuestions = $conn->query("SELECT idQuestion FROM collect WHERE idSub=$subID");
    $quizNums = "";
    while($row = $collectQuestions->fetch_assoc()){
    $quizNums .="idQuestion=". $row["idQuestion"] ." OR ";
    }
    $quizNums .= "0";//pitää lopettaa 0, koska index 0 ei ole, joten sen lisääminen ei haittaa, mutta OR pitää lopettaa.
    $questions = $conn->query("SELECT idQuestion, question, qType FROM questions WHERE $quizNums");
    return $questions;
}
function getSubName($conn,$subID) {
    $Subs = $conn->query("SELECT sub FROM subName WHERE idSub=$subID");
    while($row = $Subs->fetch_assoc()) {
        $subname = $row["sub"];
    }
    return $subname;
}

//------------------------------------------------
$messures=array('Value'=>1, 'L'=>2,'ml'=>3,'mm'=>4,'g'=>5,'mg'=>6,'μm'=>7);
$options='';
// Aloitetaan formin tekeminen kysymyksille
echo '<div class="card"><div class="card-content">';
echo '<form action="includes/quiz.inc.php" method="POST">';
//Aloitetaan subin luonti ja kysymykset
while($row = $quizSubName->fetch_assoc()) {
    echo "<h2>" . $row["subName"]. "</h2>"; //Ottaa pääotsikon
    for ($x = $lowID; $x <= $subID; $x++) {
        echo "<h4>" . getSubName($conn,$x). "</h4>";  //Ottaa tehtävän annon
        $questions = getQuestions($conn,$x);
        while($row = $questions->fetch_assoc()) {   //Aloittaa kyselyjen teon subin alle
            $_SESSION['idQuestion']=$row["idQuestion"];
            $quizNum = "";
            $quizNum = "q" .$row["idQuestion"];
            $quizNumInput = "";
            $quizNumInput = "i".$row["idQuestion"];
            if(isset($_SESSION[$quizNum])){
                $selected = $_SESSION[$quizNum];
            }else {
                $selected=' ';
            }
            echo "<br><label>" . $row["question"]."</label>";
            
            if(isset($_SESSION[$quizNumInput])){
                echo "<input class='form-control form-control-genquiz' type='text'  name=". $quizNumInput ." size='4' value='".$_SESSION[$quizNumInput]."' onchange='chkinput(this.value, $quizNumInput);' >";
            }else {
                echo "<input class='form-control form-control-genquiz' type='text'  name=". $quizNumInput ." size='4' onchange='chkinput(this.value, $quizNumInput);' >";
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
            }//Kirjoittaa dropdownint jos on
        }//lopettaa kysymyksen
    }//lopettaa tehtäväannon
}//lopettaa koko kyselyn
//Lopetus kyselyille
echo "<br><button type='submit' name='save' class='btn btn-primary btn-block' style='margin-top: 5%;'>Submit</button>";
//menee quiz.inc.php  tarkistamaan vastaukset ja (ei toimi vielä) lukitsee 1 osion ja tarkistaa että kaikkiin on vastattu. 
echo "</form>";
echo "</div></div>"
?>