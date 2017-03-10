<?php
if(isset($_POST) && !empty($_POST)){
	foreach($_POST as $key => $value){	
		switch($key){
			case "window":
				$result = file_get_contents(".load/" . $value . ".php");
				break;
		}
	}
	echo $result ;
}
?>