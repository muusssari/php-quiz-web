<?php 
    session_start();
?>
<head>
    <?php 
    require "header.php";
    ?>
</head>
<main>
    
    <header>
    <?php
    if (!empty($_GET['page'])) {
        $PageNum = $_GET['page'];
        if ($PageNum == 1) {
            include("generatequiz.php");
        } 
        else if ($PageNum == 2) {
            include("pages/about.php");
        }
        else {
            include("quiz_select.php");
        }
    }
    else {
        include("quiz_select.php");
    }
    ?>
    </header>
    <div>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<p>You are logged in!</p>';
        }
        else{
            echo '<p>You are logged out!</p>';
        }
        ?>
    </div>
    <footer>
    <?php
    require_once "footer.php";
    ?>
</footer>
    
</main>

