<?php

$host = "localhost";
$user = "root";
$pass = "raspberry";
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
      header("Location:" . "index.php");
      exit();
    }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/base/app.css">
    <link rel="stylesheet" href="css/pages/login.css">
    <link rel="stylesheet" href="css/components/header.css">
    <link rel="stylesheet" href="css/components/sidebar.css">

    <title>Login screen</title>
  </head>
  <body>

	<div class="flex-container">
		<div class="content">
		  <form method="post" action="index.php">

			<h1>Sign in</h1>
			<p>Please sign in to continue.</p>

			<label>Username:</label>
			<input type="text" name="username"></input>

			<label>Password:</label>
			<input type="password" name="password"></input>

			<div class="form-buttons">
				<div class="login">
					<input type="submit" value="Log In" class="login-btn">
				</div>
				<input type="submit" value="Register" class="login-btn">
			</div>

			<div class="extra">
			  <a href="index.php">Forgot password?</a>
			  <a href="index.php">Click here to login as a guest.</a>
			</div>

		  </form>
		</div>
	</div>

  </body>
</html>
