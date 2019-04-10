<?php

if (isset($_POST['login'])) {
    
    require 'dbh.inc.php';

    $password = $_POST['psw'];
    $username = $_POST['username'];

    if (empty($username) || empty($password)) {
        header("Location: ../home.php?error=emptyfields");
    exit();
    }

    else{
        $sql = "SELECT * FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../home.php?error=sqlerror");
            exit(); 
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row=mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row['pwdUsers']);
                if ($pwdcheck==false) {
                    header("Location: ../home.php?error=wrongpwd");
                    exit(); 
                }

                elseif ($pwdcheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['permiss'] = $row['permiss'];

                    header("Location: ../index.php?login=success");
                exit();
                }
                else{
                    header("Location: ../home.php?error=wrongpwd");
                exit();
                }
            }

            else{
                header("Location: ../home.php?error=nouser");
                exit();
            }

        }
    }
}
else {
    header("Location: ../home.php");
    exit();
}