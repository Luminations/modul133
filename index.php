<?php
session_start();
include("php/sql.php");
if(isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "" && isset($_POST["submit"])){
	$MySql->login($_POST["username"], $_POST["password"]);
}
if(isset($_SESSION["login"]) && $_SESSION["login"]){
	header("Location: main.php");
}

if(isset($_SESSION["ERROR"]) AND $_SESSION["ERROR"] !== ""){
	$error = $_SESSION["ERROR"];
	$_SESSION["ERROR"] = "";
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
    </head>
    <body>
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Wilkommen tbz.</h1>
                <nav>
                    <ul>
                        <li><a href="#">Notes</a></li>
                        <li><a href="#">Images</a></li>
                        <li><a href="#">Videos</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<?php if(isset($error) && $error !== ""){echo "<p id='errorMessage'>" . $error . "</p>";} ?>
                <form action="" id="loginForm" method="POST">
					<label class="formLabel" for="un">Username:</label>
                    <input  class="formInput"type="text" name="username" id="un">
					<label class="formLabel" for="pw">Password:</label>
                    <input class="formInput" type="password" name="password" id="pw">
					<input class="formInput" class="formLabel" type="submit" id="submit" name="submit">
					<span>Don't have an account? <a href="register.php">Sign up</a> here!</span>
                </form>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>© Boetschi, Hamdan, Fraser</h3>
            </footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
