<!-- <?php 
    require "header.php";
?> -->


<!-- Navigation Bar -->

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
            <li> <a href="./index.php" class = "from-signup-login-link">Login </a></li>
        </ul>

       
    </nav>

<!-- Signup Form -->

<main>
    <link rel="stylesheet" href="./indexstyle.css">
    <h1 class = "signup-text">Signup</h1>

    <?php

        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="signup-error"> Fill in all the fields...</p>';
            } else if ($_GET['error'] == "invaliduidmail") {
                echo '<p class="signup-error"> Invalid username and e-mail...</p>';
            }else if ($_GET['error'] == "invaliduid") {
                echo '<p class="signup-error"> Invalid username...</p>';
            }else if ($_GET['error'] == "invalidmail") {
                echo '<p class="signup-error"> Invalid e-mail...</p>';
            }else if ($_GET['error'] == "passwordcheck") {
                echo '<p class="signup-error"> Your passwords do not match...</p>';
            }else if ($_GET['error'] == "usertaken") {
                echo '<p class="signup-error"> Username is already taken...</p>';
            }
        } else if (isset($_GET['signup']) == "success") {
            echo '<p class="signup-success"> Signup Successful...</p>';
        }

    ?>

    <form class="signup-form" id = "signupf" action="./includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <button type="submit" id = "btn" name="signup-submit">Signup</button>
    </form>
</main>

<?php
    require "footer.php";
?>