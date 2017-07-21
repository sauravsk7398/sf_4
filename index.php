<?php 

require 'database.php';

require 'core.php';


if(logged_in() && !$_SESSION['nb']==1 && !$_SESSION['acc']==1){
	
	include 'into_account.php';
	
	
}else if(!logged_in()) {
    include 'login.php';
}else if (logged_in() && $_SESSION['nb']==1 && !$_SESSION['acc']==1) {
	include 'note_page.php';
	
}else if (logged_in() && !$_SESSION['nb']==1 && $_SESSION['acc']==1) {
	include 'acc_set.php';
	
}

?>