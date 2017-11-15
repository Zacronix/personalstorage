<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "personalstorage";

$connection = mysqli_connect($host, $user, $pass);
mysqli_select_db($connection, $db);

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) == 1) {
      header("Location:" . "files.php");
      exit();
    } else {
      header("Location:" . "login.php");
      exit();
    }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Login screen</title>
  </head>
  <body>

    <div class="content">
      <h1>Hello!</h1>
      <p>Welcome to my website.</p>

      <form method="post" action="login.php">
        <input placeholder="USERNAME" type="text" name="username" id="un"></input> <br>
        <input placeholder="PASSWORD" id="pw" type="password" name="password"></input> <br>
        <input type="submit" name="submit" value="Log In" id="button">

        <div class="extra">
          <a href="register.php"><p id="register">Register</p></a>
          <a href="login.php"><p id="forgotpw">Forgot password?</p></a> <br>
          <a href="login.php"><p id="loginguest">Click here to login as a guest.</p></a> <br>
        </div>
      </form>

    </div>

  </body>
</html>
