<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbName = "schema";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->error);
    }
    else
    {
        $assigned_to = htmlspecialchars($_POST["assigned-to"]); 
        $title = htmlspecialchars($_POST["title"]);
        $desc = htmlspecialchars($_POST["desc"]);
        $prio = htmlspecialchars($_POST["priority"]);
        $type = htmlspecialchars($_POST["type"]);
        $status = "open";
        $date = date("d-m-Y");
        $created_by = "admin-user";
        $q = "INSERT INTO users (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES (" . $title . " " . $desc . " " .$type . " " . $prio . " " . $status . " " . $assigned_to . " " . $created_by . " " . $date . " " . $date ");";
        if($conn->query($q) === TRUE)
        {
            echo "<h3>Success!</h3>";
        }
        else
        {
            echo "<h3>Error: " . $sql . "<br>" . $conn->error."</h3>";
        }
        $conn->close();
    }
?>