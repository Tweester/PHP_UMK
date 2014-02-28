<?php
	
	require_once DIR_MODELS . "news.php";
	$controler = "news";
	$msg = "";
		
	@$action = $_GET["action"];
	@$news_id = $_GET["id"];
		
	function show_all_news($query)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$news_id[$i] = $row['news_id'];
			$news_title[$i] = $row['news_title'];
			$news_date[$i] = $row['news_date'];
			$news_context[$i] = $row['news_context'];
			$i++;
		}
	
		require_once DIR_VIEWS . "news/news_all.php";	
	}
	
	function show_comments($query_news,$query_all_comments,$add_text)
	{

		$result = mysql_query($query_news);
		$row = mysql_fetch_array($result);
		
		$news_id = $row['news_id'];
		$news_title = $row['news_title'];
		$news_date = $row['news_date'];
		$news_context = $row['news_context'];
		
		$query_all_comments = $query_all_comments." ORDER BY coment_date DESC";
		$result = mysql_query($query_all_comments);
		
		$i = 0;
		
		if(mysql_fetch_array($result) != NULL)
			while($row = mysql_fetch_array($result))
			{
				$coment_author[$i] = $row['coment_author'];
				$coment_context[$i] = $row['coment_context'];
				$coment_date[$i] = $row['coment_date'];
				$i++;
			}
		else
			{
				$coment_author[$i] = "";
				$coment_context[$i] = "";
				$coment_date[$i] = "";
				
			}
		
		require_once DIR_VIEWS . "news/all_comments.php";
		
	}
	
	function add_comment($query,$query_show_news_id,$query_show_all_coments_news_id)
	{
		$coment_nick = $_POST["coment_nick"];
		$coment_context = $_POST["coment_context"];
		$coment_id = $_POST["coment_id"];
		
		$query = $query ."(". $coment_id .",'". $coment_nick ."','". date("Y-m-d") ."','". $coment_context ."')";
		
		$result = mysql_query($query);
		
		if ($result == 1)
			$add_text = "Komentarz dodany prawidłowo!";
		else
			$add_text = "Błąd przy dodawaniu komentarza!";		
		
		show_comments($query_show_news_id.$coment_id, $query_show_all_coments_news_id.$coment_id,$add_text);

	}
	
	//funkcje adminowskie
	
	function manage_news($function, $query, $session_id, $controler, $news_id)
	{
		if($function == "edit_news")
		{
			$query = $query.$news_id;
			echo $news_id;
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			
			$news_id = $row['news_id'];
			$news_title = $row['news_title'];
			$news_context = $row['news_context'];
			$action = "update_db_news";
			
						
			require_once DIR_VIEWS ."news/admin_manage_news.php";
		}
		else
		{
			$news_id = "";
			$news_title = "";
			$news_context = "";
			$action = "add_db_news";
			
			require_once DIR_VIEWS ."news/admin_manage_news.php";		
		}
	}

	function db_news($query_add, $query_update, $query_update2, $main_query, $session_id, $controler)
	{
		$news_title = $_POST["news_title"];
		$news_context = $_POST["news_context"];
		$function = $_POST["news_action"];
		$news_title = $_POST["news_title"];
		$news_id = $_POST["news_id"];
		
		if($function == "update_db_news")
		{
			$query_update = $query_update." news_title = '".$news_title."' , news_context = '".$news_context."'".$query_update2.$news_id;
			$result = mysql_query($query_update);
			if($result != NULL)
				$msg = "Zmodyfikowano newsa!";
			else
				$msg = "Błąd modyfikacji newsa!";
				list_news($main_query, $session_id, $controler, $msg);
		}
		else
		{
			$query_add = $query_add." ('".$news_title."','".$news_context."','".date("Y-m-d")."')";
			$result = mysql_query($query_add);
			if($result != NULL)
				$msg = "Dodano newsa!";
			else
				$msg = "Błąd dodania newsa!";
				list_news($main_query, $session_id, $controler, $msg);
		}
	}
	
	function list_news($query, $session_id, $controler, $msg)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$news_id[$i] = $row['news_id'];
			$news_title[$i] = $row['news_title'];
			$i++;
		}
	
		require_once DIR_VIEWS . "news/admin_news_list.php";	
	}
	
	function delete_news($query, $query_list, $session_id, $controler)
	{
		$news_id = $_GET["id"];
		$query = $query.$news_id;

		mysql_query($query);
		$msg = "News usunięty!";
		list_news($query_list, $session_id, $controler, $msg);
		//require_once DIR_VIEWS . "news/admin_news_list.php";		
	}
	
	
	if($action == "wszystkie" or $action == NULL)	
		show_all_news($query_show_all_news);
	
	if($action == "komentarze")
		show_comments($query_show_news_id.$news_id,$query_show_all_coments_news_id.$news_id,"");
	
	if($action == "new_coment")
		add_comment($query_add_news,$query_show_news_id,$query_show_all_coments_news_id);
	
	if($action == "admin")
		list_news($query_admin_news_list, $session_id, $controler, $msg);
	
	if($action == "delete_news")
		delete_news($query_admin_delete_news, $query_admin_news_list, $session_id, $controler);
	
	if($action == "edit_news" || $action == "add_news")
		manage_news($action,$query_admin_manage_news,$session_id, $controler, $news_id);

	if($action == "db_news")
		db_news($query_admin_add_news, $query_admin_update_news_p1, $query_admin_update_news_p2,$query_admin_news_list, $session_id, $controler);
	
	
