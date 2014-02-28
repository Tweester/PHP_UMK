<?php

	require_once DIR_MODELS . "admin.php";
	
	$session_id = 0;
	$error = "";
	
	@$action = $_GET["action"];	
	@$controler = $_GET["controler"];
	@$session_id = $_GET["session"];
	@$nick = $_POST["admin_nick"];
	@$password = $_POST["admin_password"];
	
	echo $session_id;
	


	function logowanie($query,$query_create_session, $user, $password, $query_all_modules)
	{
	
		if($user == NULL || $password == NULL)
		{
			$error = "Brak danych do logowania! Wpisz ponownie!";
			return render_admin($error);
		}		
			
		$query = $query."'".$user."'";				
		$result = mysql_query($query);
		
		$row = mysql_fetch_array($result);

		if($row == NULL)
		{
			$error = "Bład logowania! Nie istnieje taki user!";
			render_admin($error);
		}
				
		$db_password = $row['user_password'];
				
		if($password == $db_password)
			create_sesion($query_create_session,$user);
		else
		{
			$error = "Bład logowania! Niepoprawne hasło!";
			render_admin($error);			
		}	
	}
	
	function create_sesion($query,$user)
	{
		$session_id = rand(1000000,10000000);
		$session_id = md5($session_id);
		//echo $session_id;
		$query = $query."'".$user."','".$session_id."',1)";
		$result = mysql_query($query);

		if($result == 1)
		{
			require_once DIR_CONTROLLERS . "root.php";
		}
		
	}
	
	function render_admin($error)
	{
		require_once DIR_VIEWS . "admin.php";	
	}
	
	if($session_id == 0 && $action == NULL)
		render_admin($error, 0, "", 0, 0);
	
	if($session_id != 0)
	{
		$query = $query_check_session."'".$session_id."'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		if($row[0] == 1)
			require_once DIR_CONTROLLERS . "root.php";
		else 
			echo "Niepoprawna sesja!";
	}
	else
	if($action == "logowanie")
		logowanie($query_login,$query_create_session,$nick,$password, $query_all_modules);
	
	
