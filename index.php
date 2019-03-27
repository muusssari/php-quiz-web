<?php 
    session_start();
    if(!isset($_SESSION['userId'])) {
        header("Location: home.php?permission=false");
    }
?>
<head>
    <?php 
    require "header.php";
    ?>
</head>
<main>
    <header>
    <?php

    ?>
    </header>
    <section>
    <div id="main">
    <?php

    include("quiz_select.php");
    include("generatequiz.php");
    if (!empty($_GET['page'])) {
        $PageNum = $_GET['page'];
        if ($PageNum == 1) {
            include("generatequiz.php");
        } 
        else if ($PageNum == 2) {
            include("pages/about.php");
        }
    }
    
    ?>
    </div>
    </section>
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

