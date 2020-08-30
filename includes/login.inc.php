<?php

    if(isset($_POST['login-submit'])){

        require 'dbh.inc.php';

        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        if (empty($mailuid) || empty($password)) {
            
            header("Location: ../index.php?error=emptyfields&".$username);
            exit();

        } else {

            $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location: ../index.php?error=sqlerror");
                exit();

            } else {

                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid); //to check the username/email from the db thats why took the same parameters twice as the login form will get username or mail in the same space

                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {

                    $pwdCheck = password_verify($password, $row['pwdUsers']); //it will be a bullion as in 0 or 1

                    if ($pwdCheck == false) {

                        header("Location: ../index.php?error=wrongpwd");
                        exit();

                    } else if ($pwdCheck == true) {

                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['userUid'] = $row['uidUsers'];

                        header("Location: ../index.php?login=success");
                        exit();

                    } else {

                        header("Location: ../index.php?error=wrongpwd");
                        exit();

                    }

                } else {

                    header("Location: ../index.php?error=nouser");
                    exit();

                }

            }

        }
        
    }else {
        header("Location: ../index.php");
        exit();
    }