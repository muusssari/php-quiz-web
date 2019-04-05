<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
    <link rel="shortcut icon" type="image/png" href="pics/favicon_package_v0.16/favicon-32x32.png"/>
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>

        <header>
            <a href="home.php">
                <button class="btn btn-outline-light logout btn-lg">Log in</button>
            </a>
        </header>

    <div id="wrapper" class="middle">
        
        <h1>QUIZ Sign up</h1><br>

        <form action="includes/signup.inc.php" method="post">

            <input type="text" name="suUsername" class="form-control" data-toggle="tooltip" data-placement="right" 
            placeholder="Username" pattern="[a-ö0-9]+" title="Only lowercase letters or numbers in username"><br>

            <input type="password" name="suPsw" class="form-control" data-toggle="tooltip" data-placement="right" 
            placeholder="Password" pattern=".{5,}" title="Atleast 5 characters in password"><br>

            <input type="password" name="suPsw-repeat" class="form-control" data-toggle="tooltip" data-placement="right" 
            placeholder="Repeat password" pattern=".{5,}" title="Repeat you password"><br>

           <button class="btn btn-success btn-block" type="submit" name="signup">Sign up</button>

    </form>

    </div>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>


</body>
</html>