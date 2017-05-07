<?php
session_start();
include("sql.php");
if(isset($_POST) && !empty($_POST)){
	foreach($_POST as $key => $value){	
		switch($key){
			case "window":
				$result = file_get_contents(".load/" . strtolower($value) . ".php");
				break;
			case "manipulate":
				foreach($value as $action => $param){
					switch($action){
						case "deleteNote":
							$result = $MySql->deleteNote($param);
							break;
						case "addNote":
							
							break;
						case "deleteVideo":
							$result = $MySql->deleteVideo($param);
							break;
						case "addVideo":
							
							break;
					}
				}	
				
				
				break;
			case "getter":
				switch($value){
					case "session":
						$result = $_SESSION['login'];
						break;
					case "videos":
						$array = $MySql->getMedia("vid");
						break;
					case "images":
						$array = $MySql->getMedia("img");
						break;
					case "notes":
						$array = $MySql->getNotes();
						break;
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
