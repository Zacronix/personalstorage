<?php
session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=personalstorage', "root", "Plien7591");
    if (isset($_POST[ 'login' ])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindParam("username", $username);
        $query->bindParam("password", $password);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($query->rowCount() == 1) {
            $_SESSION['username'] = $result[0]['username'];
            header("Location:"."files.php");
        } else {
          //
        }
    }
} catch(PDOException $e) {
    die("Error!: ".$e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/base/app.css">
    <link rel="stylesheet" href="css/pages/login.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

    <title>Login screen</title>
</head>
<body>
    <div class="flex-container">
        <div class="content">
            <form method="post">
                <h1>Sign in</h1>
                <p>Please sign in to continue.</p>

                <label>Username:</label>
                <input type="text" name="username"></input>

                <label>Password:</label>
                <input type="password" name="password"></input>

                <div class="form-buttons">
                    <div class="login">
                        <input type="submit" name="login" value="Log In" class="login-btn">
                    </div>
                    <input type="submit" value="Register" class="login-btn">
                </div>

                <div class="extra">
                    <a href="#">Forgot password?</a>
                    <a href="#">Click here to login as a guest.</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
