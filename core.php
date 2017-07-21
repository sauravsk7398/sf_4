<?php

ob_start();
session_start();

$this_page = $_SERVER['SCRIPT_NAME'];
//$you_were_here = $_SERVER['HTTP_REFERER'];


function logged_in() {
	if(isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
		
		return true;
	}else {
		return false;
	}
}

function grab_data($head) {
	$query = "SELECT `$head` FROM `myuser` WHERE `id`='".$_SESSION['USER_ID']."'";
	if($query_run=mysql_query($query)) {
		if($query_output=mysql_result($query_run,0,$head)) {
			return $query_output;
		}
	}
}

function permit() {
	
	return 1;
}

?>