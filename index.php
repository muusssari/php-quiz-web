<?php 
    session_start();
    if(!isset($_SESSION['userId'])) {
        header("Location: home.php?permission=false");
    }
?>
<head>
    <?php 
    require "head.php";
    ?>
</head>
<main>
    <header>
    <?php
        include_once("header.php");
    ?>
    </header>
    <section>
    <div id="main">
    <div id="left">
    <div class='card'><div class='card-content'>
    <?php
    include_once("quiz_select.php");
    ?>
    </div>
</div>
    </div>
    <div id="right">
    <?php
    
    if (!empty($_GET['page'])) {
        $PageNum = $_GET['page'];
        if ($PageNum == 1) {
            include("generatequiz.php");
        } 
        else if ($PageNum == 2) {
            include("generatequiz.php");
            //include("pages/about.php");
        }
        else if ($PageNum == 3) {
            include("generatequiz.php");
            //include("pages/about.php");
        }
    }
    else {
        //include("generatequiz.php");
        include("logo.php");
    }
    ?>
    </div>
    </div>

<footer>
    <?php
    require_once "footer.php";
    ?>
</footer>
    
</main>

