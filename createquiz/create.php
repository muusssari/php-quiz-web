<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
</head>
<body onload="generateCreate()">
    <div id="id"></div>
    <?php
    session_start();
    $name = 22;
    ?>
    <script type="text/javascript" src="main.js">
        var php = "<?php echo $name; ?>";
        console.log(php);
    </script>
    
    
</body>

</html>