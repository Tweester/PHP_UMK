<?php
	$query_all_modules = "SELECT * FROM modules"; 
	$query_login = "SELECT * FROM user WHERE user_name = ";
	$query_create_session = "INSERT INTO session (session_user, session_key, session_active) values (";
	$query_check_session = "SELECT session_active FROM session WHERE session_key =";
