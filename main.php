<?php
session_start();
include("php/sql.php");
if(!isset($_SESSION["login"]) OR $_SESSION["login"] == 0){
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/video-js.css">
		<link rel="stylesheet" href="css/image.css">
    </head>
    <body>
	<button class="logout">logout</button>
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Wilkommen <?php echo $MySql->getUsername($_SESSION["login"])[0]["username"] ?>.</h1>
                <nav>
                    <ul>
                        <li><a href="#" class="redirect">Notes</a></li>
                        <li><a href="#" class="redirect">Images</a></li>
                        <li><a href="#" class="redirect">Videos</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <a id="upload" href="upload.php" target="_blank" style="color: #ffffff; text-decoration: none;"><h3>Upload here</h3></a>
            </footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="js/cookies.js"></script>
        <script src="js/script.js"></script>
		<script src="http://vjs.zencdn.net/5.19.0/video.js"></script>
    </body>
</html>
