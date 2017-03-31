<?php
if(isset($_POST) && !empty($_POST)){
echo $value;
	foreach($_POST as $key => $value){	
		switch($key){
			case "window":
				$result = file_get_contents(".load/" . strtolower($value) . ".php");
				break;
		}
	}
	echo $result ;
}
?>
