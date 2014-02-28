<?php

	require_once DIR_MODELS . "tournament.php";

	@$action = $_GET["action"];
	@$category_id = $_GET["id"];
	$msg = "";

	function show_tournament($query)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$tournament_id[$i] = $row['tournament_id'];
			$tournament_title[$i] = $row['tournament_name'];
			$tournament_context[$i] = $row['tournament_context'];
			$i++;
		}
	
		require_once DIR_VIEWS . "tournament/tournament.php";	
	}
	

	//funkcje administratoriskie
	function manage_tournament($function, $query, $session_id, $controler, $tournament_id)
	{
		if($function == "edit_tournament")
		{
			$query = $query.$tournament_id;
			echo $tournament_id;
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			
			$tournament_id = $row['tournament_id'];
			$tournament_name = $row['tournament_name'];
			$tournament_context = $row['tournament_context'];
			$action = "update_db_tournament";

			require_once DIR_VIEWS ."tournament/admin_manage_tournament.php";
		}
		else
		{
			//$tournament_id = "";
			$tournament_name = "";
			$tournament_context = "";
			$action = "add_db_news";
			
			require_once DIR_VIEWS ."tournament/admin_manage_tournament.php";		
		}
	}

	function db_tournament($query_add, $query_update, $query_update2, $main_query, $session_id, $controler)
	{
		$tournament_name= $_POST["tournament_name"];
		$tournament_context = $_POST["tournament_context"];
		$function = $_POST["tournament_action"];
		$tournament_id = $_POST["tournament_id"];
		
		if($function == "update_db_tournament")
		{
			$query_update = $query_update." tournament_name = '".$tournament_name."' , tournament_context = '".$tournament_context."'".$query_update2.$tournament_id;
			$result = mysql_query($query_update);
			if($result != NULL)
				$msg = "Zmodyfikowano kategorie!";
			else
				$msg = "Błąd modyfikacji kategorii!";
				list_tournament($main_query, $session_id, $controler, $msg);
		}
		else
		{
			$query_add = $query_add." ('".$tournament_name."','".$tournament_context."')";
			$result = mysql_query($query_add);
			if($result != NULL)
				$msg = "Dodano kategorie!";
			else
				$msg = "Błąd dodania kategorii!";
				list_tournament($main_query, $session_id, $controler, $msg);
		}
	}
	
	function list_tournament($query, $session_id, $controler, $msg)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$tournament_id[$i] = $row['tournament_id'];
			$tournament_name[$i] = $row['tournament_name'];
			$i++;
		}
	
		require_once DIR_VIEWS . "tournament/admin_tournament_list.php";	
	}
	
	function delete_tournament($query, $query_list, $session_id, $controler)
	{
		$news_id = $_GET["id"];
		$query = $query.$news_id;

		mysql_query($query);
		$msg = "News usunięty!";
		list_tournament($query_list, $session_id, $controler, $msg);
				
	}
	
	if($action == NULL)
		show_tournament($query_show_all_torunament);
	
	if($action == "admin")
		list_tournament($query_admin_tournament_list, $session_id, $controler, $msg);
	
	if($action == "delete_tournament")
		delete_tournament($query_admin_delete_tournament, $query_admin_tournament_list, $session_id, $controler);
	
	if($action == "edit_tournament" || $action == "add_tournament")
		manage_tournament($action,$query_admin_manage_tournament,$session_id, $controler, $category_id);

	if($action == "db_tournament")
		db_tournament($query_admin_add_tournament, $query_admin_update_tournament_p1, $query_admin_update_tournament_p2,$query_admin_tournament_list, $session_id, $controler);
	
