<?php
    include "../php/database.php";    
    if (!empty($_POST["register"])) {
        try {
        $conn = get_connection();

        if (empty($_POST["username"])) {
            echo ("Please enter a valid username.");
        } else if (empty($_POST["password"])) {
            echo ("Please enter a valid password.");
        }
        
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        // Past that - we have a username & a password, process.


        $sql = "INSERT INTO accounts (username, password) VALUES ('{$username}', '{$password}')";

        $conn->query($sql);
        echo ("Successfuly registered your account!");
        header("Location: login.php");
        } catch (mysqli_sql_exception $e) {
            // echo("<p id=\"database-error\">Couldn't connect to the database</p>");
            // echo($e);
            if (str_contains($e, "for key 'username'")) {
                echo("This username is already used.");
            } else {
                echo "a Database-related issue has occured.";
            }
        };
    
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>