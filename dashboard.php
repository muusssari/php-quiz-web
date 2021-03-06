<?php 
    require "head.php";
    require 'includes/dbh.inc.php';
?>
<div class="container-fluid">
<div class="card"> 
            <div class="card-body">
            <h1 class="selectH" style="font-size: 35pt;">Teacher Dashboard</h1>
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
                            echo '<li><button type="button" class="btn btn-primary btn-block" onclick="studentScores('.$row["idUsers"].')"><h3>Student: '.$row["uidUsers"].'</h3></button></li>';
                        }
                    }
                    ?>
                </ul>
            </div> 
        </div>
        </div>
    <div id="dashMid">
    <div class="card">
            <div class="card-header"><h2>Completed quizzes and points: </h2></div>
            <div class="card-body">
                <ul id="scores">
                    
                </ul>
            </div> 
        </div>    
    </div>
    <script>
    function studentScores(id) {
        document.getElementById('scores').innerHTML = "";

        $.ajax({
            data:{id: id},
            url: 'includes/checkScores.php',
            method: 'POST',
            success: function(msg) {
                console.log("call back:" + msg);
                $('#scores').append(msg);
            }
        });
    }
</script>
</div>
</div>