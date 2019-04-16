<?php
require 'dbh.inc.php';


function deleteQestion($conn, $idQ, $table) {
    $sql="DELETE FROM $table WHERE idQuestion=$idQ";
    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
     } else {
        echo "Error deleting record: " . mysqli_error($conn);
     }
    //echo  $table . "done,";
}
function deleteSub($conn, $idQ, $table) {
    $sql="DELETE FROM $table WHERE idSub=$idQ";
    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
     } else {
        echo "Error deleting record: " . mysqli_error($conn);
     }
    //echo "subname done,";
}
function deleteQuiz($conn, $idQ, $table) {
    $sql="DELETE FROM $table WHERE idQuiz=$idQ";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
     } else {
        //echo "Error deleting record: " . mysqli_error($conn);
     }
    //echo "Quiz done,";
}
function deleteColl($conn, $idQ, $table) {
    $sql="DELETE FROM $table WHERE idQuiz=$idQ";
    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
     } else {
        echo "Error deleting record: " . mysqli_error($conn);
     }
    //echo "coll done,";
}

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $coll = $conn->query("SELECT * FROM collect WHERE idQuiz=$id");
    mysqli_query($conn,'SET foreign_key_checks = 0');
    while($row = $coll->fetch_assoc()) {
        $idQuestion = $row['idQuestion'];
        deleteQestion($conn, $idQuestion, 'questions');
        deleteQestion($conn, $idQuestion, 'userAns');
        $idsub = $row['idSub'];
        deleteSub($conn, $idsub, 'subName');
        $idQuiz = $row['idQuiz'];
        deleteQuiz($conn, $idQuiz, 'quiz');
    }
    deleteColl($conn, $id, 'collect');
    mysqli_query($conn,'SET foreign_key_checks = 1');
    echo "Quiz Deleting Complete";
}

?>