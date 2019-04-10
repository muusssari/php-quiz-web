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
    if($_SESSION['permiss'] == true){
        if (!empty($_GET['page'])) 
        {
            if($_GET['page'] == 1) {
                include("dashboard.php");
            } else if($_GET['page'] == 2) {
                include("createquiz/create.html");
            }
            
        }
        else {
            include("logo.php");
        }
    }else {
        if (!empty($_GET['page'])) 
        {
            include("generatequiz.php");
        }
        else {
            include("logo.php");
        }
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

