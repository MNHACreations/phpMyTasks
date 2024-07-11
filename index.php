<?php
            if (session_status() != PHP_SESSION_NONE) {
                header("Location: ./pages/tasks.php");
            }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <title>phpMyTasks</title>
</head>
<body>
    <h1 id="name">phpMyTasks</h1>
    <p id="description">a self-hosted open-source tool designed to provide you & your organization a tasklist that is easy to manage.</p>
        <!-- Sending the POST-Request (Data) - US/PASS to pages/login.php (Not to re-write the same logic). -->
    <form id="login-form" action="./pages/login.php" method="post">
        <label id="username-label">Username</label><br><input id="username" type="text" name="username"> <br>
        <label id="password-label">Password</label><br><input id="password" type="password" name="password"> <br>
        <input id="login" type="submit" name="login" value="Login"> <br>
        <a id="register" href="./pages/register.php">Register a new account!</a>
    </form>
</body>
</html>