<?php
session_start();
include("sql.php");
	if(isset($_FILES)){
		$name = $_POST['title'];
		$desc = $_POST['description'];
		$file = $_FILES["image"];
		switch($file["type"]){
			case "image/png":
				$path = "media/img/". $file['name'];
				$MySql->saveMedia("img", "png", $path, $name, $desc);
				move_uploaded_file($file['tmp_name'], "../". $path);
				break;
			case "image/jpeg":
				$path = "media/img/". $file['name'];
				$MySql->saveMedia("img", "png", $path, $name, $desc);
				move_uploaded_file($file['tmp_name'], "../". $path);
				break;
			case "video/mp4":
				$path = "media/vid/". $file['name'];
				$MySql->saveMedia("vid", "mp4", $path, $name, $desc);
				move_uploaded_file($file['tmp_name'], "../". $path);
				break;
			default:
				die("Either you tried to upload an invalid datatype or an error occured. Try again");
				break;
		}
	} else if(isset($_POST['title']) && isset($_POST['description'])){
		echo "hi";
	}
	var_dump($_POST);
?>