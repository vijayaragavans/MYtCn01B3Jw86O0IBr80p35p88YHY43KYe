<?php
	session_start();
	define('host', 'localhost');
	define('username', 'root');
	define('password', 'root');
	define('db_name', 'rightern_mystat'); 	
	
	//$connect = mysql_connect(host, username, password) or die ("Connect FIELD");
	//$select_db = mysql_select_db(db_name) or die("DB connection FIELD");

	
	$connect= mysqli_connect(host,username,password,db_name); 
	
	if (!$connect)
	{
		printf("Can't connect to MySQL Server.", mysqli_connect_error());
		exit;
	}
	
	?>