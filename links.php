<?php
	session_start();
    $username = $_SESSION['username'];

    if ($username === null) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="/css/base/app.css">
    <link rel="stylesheet" href="/css/pages/links.css">

		<script src="https://use.fontawesome.com/e900784a2c.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

    <title>My files</title>
  </head>
  <body>

      <!-- Navbar start -->



      <div class="navbar">
        <h1 class="logo">PERSONAL STORAGE</h1>
        <input type="text" placeholder="Search..." id="search">

        <h3 class="user"><a href="#"><?php echo $username ?></a></h3>
      </div>

      <div class="sidebar">
				<ul>
					<li><a href="files.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="links.php"><i class="fa fa-link" aria-hidden="true"></i></a></li>
					<li><a href="upload.php"><i class="fa fa-upload" aria-hidden="true"></i></a></li>
					<li><a href="settings.php"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
				</ul>
      </div>



      <!-- Navbar end -->



			<h2 class="title">Links</h2>
      <h3 class="subtitle">Tutorials & Downloads</h3>

			<div class="linkrow1">
				<div class="link001">
					<div class="link001-image"></div>
				</div>

				<div class="link002">
					<div class="link002-image"></div>
				</div>
			</div>

			<div class="linkrow2">
				<div class="link003">
					<div class="link003-image"></div>
				</div>

				<div class="link004">
					<div class="link004-image"></div>
				</div>
			</div>

			<div class="linkrow3">
				<div class="link005">
					<div class="link003-image"></div>
				</div>

				<div class="link006">
					<div class="link004-image"></div>
				</div>
			</div>
