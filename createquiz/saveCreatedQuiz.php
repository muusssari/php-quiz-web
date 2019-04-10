<?php
session_start();
require '../includes/dbh.inc.php';
$sql="";


if(isset($_POST['quiz']) && isset($_POST['subname'])) {
    $qname = $_POST['quiz'];
    $subname = $_POST['subname'];
    $sql = "INSERT INTO quiz (quiz, subName)
    VALUES ('$qname', '$subname')";
    $done = sendData($sql, $conn);
    $_SESSION['quizID'] = getId($conn, "idQuiz","quiz","subName",$subname);
}

else if(isset($_POST['sub2'])) {
    $sub = $_POST['sub2'];
    $sql = "INSERT INTO subName (sub)
    VALUES ('$sub')";
    $done = sendData($sql,$conn);
    $_SESSION['subID'] = getId($conn, "idSub","subName","sub",$sub);
}
else if(isset($_POST['question']) && isset($_POST['rightAns']) && isset($_POST['rightAnsQ']) && isset($_POST['qType'])) {
    $question = $_POST['question'];
    $rightAns = $_POST['rightAns'];
    $rightAnsQ = $_POST['rightAnsQ'];
    $qType = $_POST['qType'];
    $sql = "INSERT INTO questions (question, rightAns, rightAnsQ, qType)
    VALUES ('$question', '$rightAns', '$rightAnsQ', $qType)";
    $done = sendData($sql,$conn);
    $questionID = getId($conn, "idQuestion","questions","question",$question);
    $quizID = $_SESSION['quizID'];
    $subID = $_SESSION['subID'];
    $sql = "INSERT INTO collect (idQuiz,idSub,idQuestion)
    VALUES ($quizID,$subID ,$questionID)";
    if($done == true) {
        addToCollect($sql,$conn);
    }
    
}else {
}

function sendData($sql, $conn) {
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
    } else {
        echo "Error to sendData: " . $sql . "<br>" . $conn->error;
        return false;
    }
}
function getId($conn,$quiz, $quizTable, $name, $sendName) {
    $result = $conn->query("SELECT * FROM $quizTable");
    $id = 0;
    while($row = $result->fetch_assoc()) {
        $id = $row[$quiz];
    }
    return $id;
}
function addToCollect($sql,$conn) {
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error to collect : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>