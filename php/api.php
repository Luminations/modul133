<?php
session_start();
include("sql.php");
if(isset($_POST) && !empty($_POST)){
	foreach($_POST as $key => $value){	
		switch($key){
			case "window":
				$result = file_get_contents(".load/" . strtolower($value) . ".php");
				break;
			case "videoAction":
				switch($value){
					case "Last":
						break;
					case "Delete":
						
						break;
					case "Next":
						
						break;
				}
				break;
			case "getter":
				switch($value){
					case "session":
						$result = $_SESSION['login'];
						break;
					case "videos":
						$array = $MySql->getMedia("vid");
				}
				break;
		}
	}
	if(isset($result)){
		echo $result ;	
	} else {
		print_r($array);
	}
}
?>
