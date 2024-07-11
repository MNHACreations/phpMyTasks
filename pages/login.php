<?php
    session_start();

    include "../php/database.php";    
    if (!empty($_POST["login"])) {
        try {
        $conn = get_connection();

        if (empty($_POST["username"])) {
            echo ("Please enter a valid username.");
        } else if (empty($_POST["password"])) {
            echo ("Please enter a valid password.");
        }
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Storing the hashed version - for later logical check (login entry)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Past that - we have a username & a password, process.

        # select from accounts where exact (username = username) and hashed password = hashed password;

        # ALTERNATIVE: Retrieving the username | Later verifiyng the password
        $sql = "SELECT * FROM accounts WHERE username='{$username}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["username"] = $username;  
                $_SESSION["password"] = $password;

                echo ("Successfuly logged in, redirecting you...");
                header("Location: tasks.php");
            } else {
                echo("wrong password, try again!");
            }
            }
        } else {
            // echo("This username doesn't exist.");
            echo ("Couldn't find that username, please try again.");
        }
        } catch (mysqli_sql_exception $e) {
            // echo("<p id=\"database-error\">Couldn't connect to the database</p>");
            // echo($e);
            if (str_contains($e, "for key 'username'")) {
                echo("This username is already used.");
            } else {
                echo "a Database-related issue has occured.";
                echo ($e);
            }
        };
    
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/home.css">

</head>
<body>
    <p>PHPMYTASKS</p>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" id="username">
        <input type="password" name="password" id="password">
        <input type="submit" name="login" value="Login" id="login">
    </form>
</body>
</html>