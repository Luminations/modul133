<?php
session_start();
include("php/sql.php");
if(isset($_POST["submit"]) && isset($_POST["username"])
	&& isset($_POST["password"]) && isset($_POST["repeatPassword"]) 
	&& isset($_POST["email"]) && $_POST["username"] !== "" 
	&& $_POST["password"] !== "" && $_POST["repeatPassword"] !== "" 
	&& $_POST["email"] !== ""){
	if($_POST["password"] == $_POST["repeatPassword"]){
		$MySql->register($_POST["username"], md5($_POST["password"]), $_POST["email"]);
	} else {
		$error = "Passwords do not match";
	}
	
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
                <h1 class="title">h1.title</h1>
                <nav>
                    <ul>
                        <li><a href="#">nav ul li a</a></li>
                        <li><a href="#">nav ul li a</a></li>
                        <li><a href="#">nav ul li a</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<?php if(isset($error) && $error !== ""){echo "<p id='errorMessage'>" . $error . "</p>";} ?>
                <form action="" id="registerForm" method="POST">
					<label class="formLabel" for="un">Username:</label>
                    <input  class="formInput"type="text" name="username" id="un">
					<label class="formLabel" for="pw">Password:</label>
                    <input class="formInput" type="password" name="password" id="pw">
					<label class="formLabel" for="pw2">Repeat password:</label>
                    <input class="formInput" type="password" name="repeatPassword" id="pw2">
					<label class="formLabel" for="em">Email:</label>
                    <input class="formInput" type="email" name="email" id="em">
					<input class="formInput" class="formLabel" type="submit" id="submit" name="submit">
					<span>Already have an Account? <a href="index.php">Log in</a> here!</span>
                </form>
            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>footer</h3>
            </footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
