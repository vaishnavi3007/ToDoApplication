<?php

	define('dbHost', 'localhost');
	define('dbUser', 'root');
	define('dbPass', '');
	define('dbName', 'todo');

	$con=mysqli_connect(dbHost,dbUser,dbPass,dbName);

	if(!$con)
	{
		echo 
		"Failed to connect database";
	}
	else
	{

	}

?>