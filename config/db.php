<?php
	//połączenie z baza danych

	$server = "mysql";
	$hostname = "localhost";
    $username = "root";
	$password = "";
	$database = "crt";
	

	$connection = mysql_connect($hostname , $username, $password)
			or die("Brak mozliwosci polaczenia sie do bazy!");
	$db = mysql_select_db($database, $connection)
			or die("Blad wyboru DB!");
	mysql_set_charset('utf8', $connection);