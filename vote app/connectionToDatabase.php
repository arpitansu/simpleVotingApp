<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';

	$database = 'vote_counter_database';
	
		if(mysql_connect($host,$user,$password)){
			mysql_select_db($database);
			
		}else {
			die(mysql_error());
		}

?>