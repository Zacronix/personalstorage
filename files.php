<?php
session_start();
$username = $_SESSION["username"];
if(!isset($_SESSION["username"]))
{
    header("location:index.php?action=login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="/css/base/app.css">
    <link rel="stylesheet" href="/css/pages/files.css">

    <script src="https://use.fontawesome.com/e900784a2c.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

    <title>My files</title>
</head>
<body>

<!-- Navbar start -->


<div class="navbar">
    <h1 class="logo">PERSONAL STORAGE</h1>
    <input type="text" placeholder="Search..." id="search">

    <div class="dropdown">
        <h3 class="user"><a href="#"><?php echo $username ?></a></h3>
        <div class="dropdown-content">
            <p><a href="logout.php">LOG OUT</a></p>
        </div>
    </div>

</div>

<div class="sidebar">
    <ul>
        <li><a href="files.php" class="active"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="links.php"><i class="fa fa-link" aria-hidden="true"></i></a></li>
        <li><a href="upload.php"><i class="fa fa-upload" aria-hidden="true"></i></a></li>
        <li><a href="settings.php"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
    </ul>
</div>


<!-- Navbar end -->


<h2 class="title">Dashboard</h2>
<h3 class="subtitle">Statistics & Details</h3>

<div class="stats-container">
    <div class="storagestats">
        <h2>STORAGE</h2>
        <b>0 bytes</b>
        <h3 class="storagesubtitle">USED OUT OF 5GB</h3>
    </div>

    <div class="otherstats">
        <h2>OTHER STATS</h2>
        <h3>These are some other statistics</h3>
    </div>
</div>

<div class="recentfiles">
    <h2 class="recentfilestitle">RECENT FILES</h2>
    <h3>No files uploaded yet...</h3>
</div>


</body>
</html>
