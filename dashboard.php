<?php 
    require "head.php";
    require 'includes/dbh.inc.php';
?>
<div class="container-fluid">
<div class="card"> 
            <div class="card-body">
            <h1>Teacher Dashboard</h1>
            </div> 
        </div>

<div id="dashCont">
  
    <div id="dashLeft">
        <div class="card">
            <div class="card-header"><h2>Select student: </h2></div>
            <div class="card-body">
                <ul>
                    <?php
                    $students = $conn->query("SELECT * FROM users");
                    while($row = $students->fetch_assoc()) {
                        if($row["permiss"] == false) {
                            echo '<li><button type="button" onclick="studentScores('.$row["idUsers"].')"><h3>'.$row["uidUsers"].'</h3></button></li>';
                        }
                    }
                    ?>
                    <li><h3>Student 1</h3></li>
                </ul>
            </div> 
        </div>
        </div>
    <div id="dashMid">
    <div class="card">
            <div class="card-header"><h2>Quizzes completed and points: </h2></div>
            <div class="card-body">
                <ul>
                    <li><h3>Student 1</h3></li>
                    <li><h3>Student 2</h3></li>
                    <li><h3>Student 3</h3></li>
                    <li><h3>Student 4</h3></li>
                    <li><h3>Student 5</h3></li>
                </ul>
            </div> 
        </div>    
    </div>
    
</div>
</div>