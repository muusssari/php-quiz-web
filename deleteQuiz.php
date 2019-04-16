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
            <div class="card-header"><h2>Delete quiz: </h2></div>
            <div class="card-body">
                <ul>
                    <?php
                    $quiz = $conn->query("SELECT * FROM quiz");
                    while($row = $quiz->fetch_assoc()) {
                        echo '<li><button type="button" class="buton btn btn-primary btn-block" onclick="deleteQuiz('.$row["idQuiz"].')"><h3>'.$row["quiz"].'</h3></button></li>';
                    }
                    ?>
                </ul>
            </div> 
        </div>
        </div>

    <script>
    function deleteQuiz(id) {

        $.ajax({
            data:{id: id},
            url: 'includes/delete.php',
            method: 'POST',
            success: function(msg) {
                console.log("call back:" + msg);
                alert(msg);
                window.open("index.php?page=3", "_self");
            }
        });
        
    }

    $( ".buton" ).hover(
  function() {
    $( this ).toggleClass('btn-danger');
  }
    )
</script>
</div>
</div>