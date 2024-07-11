<?php
$server = "localhost";
$user = "root";
$password = "";
$db_name = "";
$connection = null;
function get_connection() {
    global $server;
    global $user;
    global $password;
    global $db_name;
    global $connection;
    if ($connection == null) {
        $connection = mysqli_connect($server, $user, $password, $db_name);  
    }
    initiate_db($connection);

    return $connection;
};

function initiate_db(mysqli $conn) {

    $sql1 = "CREATE DATABASE IF NOT EXISTS PhpMyTasks;";
    $sql2 = "use PhpMyTasks;";
    $sql3 = "   
    
    CREATE TABLE IF NOT EXISTS Accounts (
        username VARCHAR(30) UNIQUE NOT NULL,
        password VARCHAR(250) NOT NULL
    )";

    
    // global connection;
    $conn->query($sql1);
    $conn->query($sql2);
    $conn->query($sql3);
    
}
?>