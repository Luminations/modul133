<?php
session_start();
include("sql.php");
if(isset($_SESSION['login'])){
	if(!empty($_FILES)){
		if($_FILES["image"]["error"] !== 4){
			if($_FILES["image"]["error"] !== 1){
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
			} else {
				echo "The uploaded file exceeds the allowed filesize";
			}
		} else if(isset($_POST['title']) && isset($_POST['description'])){
			$name = $_POST['title'];
			$desc = $_POST['description'];
			var_dump($MySql->saveNotes($name, $desc));
		} else {
			echo "Bitte fülle sowohl einen Titel, als auch eine Beschreibung ein.";
		}
		echo "<script>window.close();</script>";
	} else{
		echo "Es ist ein Fehler aufgetreten. Versuchen Sie bitte ein anderes File";
	}
}else{
	header("Location: ../index.php");
}
?>