<?php
$connect = mysqli_connect("localhost", "root", "Plien7591", "loginsystem");
session_start();
if (isset($_SESSION["username"])) {
    header("location:files.php");
}
if (isset($_POST["register"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo '<script>alert("Both Fields are required")</script>';
    } else {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";
        if (mysqli_query($connect, $query)) {
            echo '<script>alert("Registration success!")</script>';
        }
    }
}
if (isset($_POST["login"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo '<script>alert("Both Fields are required")</script>';
    } else {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (password_verify($password, $row["password"])) {
                    //return true;
                    $_SESSION["username"] = $username;
                    header("location:files.php");
                } else {
                    //return false;
                    echo '<script>alert("Wrong User Details")</script>';
                }
            }
        } else {
            echo '<script>alert("Wrong User Details")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/pages/style.css">
</head>
<body>
<br/><br/>
<div class="container">
    <?php
    if (isset($_GET["action"]) == "login") {
        ?>
        <h2 class="title">Login</h2>
        <br/>
        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" class="form-control"/>
            <br/>
            <label>Password:</label>
            <input type="password" name="password" class="form-control"/>
            <br/>
            <div class="buttons">
                <input type="submit" name="login" value="Login" class="button"/>
            </div>
            <br/>
            <p><a href="index.php">Click here to register</a></p> <br>
        </form>
        <?php
    } else {
        ?>
        <h2 class="title">Register</h2>
        <br/>
        <form method="post">
            <label>Enter Username:</label>
            <input type="text" name="username" class="form-control"/>
            <br/>
            <label>Enter Password:</label>
            <input type="text" name="password" class="form-control"/>
            <br/>
            <div class="buttons">
                <input type="submit" name="register" value="Register" class="button"/>
            </div>
            <br/>
            <p><a href="index.php?action=login">Click here to login</a></p> <br>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>