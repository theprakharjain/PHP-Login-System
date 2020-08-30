<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./indexstyle.css">
</head>
<body>
    
<header>
    <nav class="nav-header">
        
        <ul>
            <li> <a href="./index.php">Home </a></li>
            <li> <a href="#">Portfolio </a></li>
            <li> <a href="#">About us </a></li>
            <li> <a href="#">Contact </a></li>
        </ul>

       
    </nav>

    <?php

        if (isset($_SESSION['userId'])) {

            echo '<form class= "logout-button-class" action="includes/logout.inc.php" method= "post">
            <button class = "logout-button" type="submit" name="logout-submit">Logout</button>
        </form>';

        } else {

            echo '<div class="container">
            <form class = "login-form" id = "loginf" action="includes/login.inc.php" method= "post">
                <input type="text" name="mailuid" value="" placeholder="Username/Email">
                <input type="password" name="pwd" value="" placeholder="Password">
                <button type="submit" id = "btn" name="login-submit">Login</button>
            </form>

            <a class = "signup-link"  href="./signup.php" onclick = "login()">signup</a>
            
    </div>';
        }

    ?>

<script>
    function login(){
        // document.queryselector(".container").style.cssText = "display = none;";
        document.getElementById('loginf').style.visibility = hidden;
        // document.queryselector(".login-form").style.cssText = "display = none;";
    }
</script>

</header>




