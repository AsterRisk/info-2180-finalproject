<!DOCTYPE html>
<html>
    <head>
        <title>View Detailed issue</title>
    </head>
    <body>

        <?php
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->error);
            }
            else
            {
                $id = $_POST["id"]
                $q = "SELECT * FROM issues WHERE ID =  . $id . ;";
                $results = $conn->query($q);
                echo "<h3>". $results['title']. "</h3>";
                echo "<h6>Issue #". $results['id'] . "</h6>";
                echo "<br><br>";
                echo "<p>". $results['desc']. " </p>";
                echo "<br>";
                echo "<p>Created by: " . $results['created_by'] . "</p>";
                echo "<p>Last updated on: " . $results['updated'] . "</p>";
            ?>
            <div id = "sidebar">
                <?php
                    echo "<p>Assigned to:</p> ". $results['assigned_to']."<br>";
                    echo "<p>Type:</p> ". $results['type']."<br>";
                    echo "<p>Priority:</p> ". $results['priority']."<br>";
                    echo "<p>Status:</p> ". $results['open']."<br>";
                ?>
                <input type = "button">Mark as Closed</input>
                <input type = "button">Mark as Open</input>
                <input type = "button">Logout</input>
            </div>
        ?>

    </body>
</html>