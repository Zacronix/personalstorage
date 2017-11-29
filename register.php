<?php
include_once('dbconnection.php');
if(!empty($_POST['username'])) {
  if(!empty($_POST['password'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $q = Database::getDb()->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $q->execute([$username, $password]);
    header("Location:"."index.php");
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/base/app.css">
    <link rel="stylesheet" href="css/pages/register.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

    <title>Register Screen</title>
</head>
<body>
    <div class="flex-container">
        <div class="content">
            <form method="post">
                <h1>Register</h1>
                <p>Please register to continue.</p>

                <label>Username:</label>
                <input type="text" name="username"></input>

                <label>Password:</label>
                <input type="password" name="password"></input>

                <div class="form-buttons">
                    <input type="submit" value="Register" class="login-btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
