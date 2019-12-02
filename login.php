<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BugMe Issue Tracker</title>		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<?php
    // If the user is logged in, they are redirected to index.php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
        header("Location: index.php");

    // Login Credentials for admindb
    $text = '';

    if ($_POST) {
        $mail = $_POST["email"];
        $pass = $_POST["password"];
        if (strlen($mail) < 50 && strlen($pass) < 50) {
            $san_mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            $san_pass = filter_var($pass, FILTER_SANITIZE_STRING);
            $hashed_pass = md5($san_pass);            
            $srv = $conn->query("SELECT id, password as pwd FROM users WHERE email='$email'");
            $srv->execute();
            $check = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($check) {
                if ($hashed_pass === $result[0]['pass']) {
                    //If passes validation the user is redirected to index.html
                    $_SESSION['loggedin'] = True;
                    $_SESSION['timeout'] = time();
                    $_SESSION['user'] = $result[0]['id'];                    
                    header("Location: index.php");
                    exit;
                } else {
                    $text = "<h3>Your Email or Password is incorrect.</h3>";
                }
            }
        }

    } else {
        $email = "";
    }

?>

<body>
    <header>
        <ul>
            <li id="header">
                <i class="fas fa-bug"></i>
                BugMe Issue Tracker
            </li>
        </ul>
    </header>
    <main>
    <div id="login">
        <form action="login.php" onsubmit="return login_check(this.password)" method="POST">
            <h2>Login</h2>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" placeholder="Email" value="<?= $email?>"required><br>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <div id="messages"><?=$message?></div>
    </main>
    
</body>
</html>