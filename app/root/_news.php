<?php
	
	require_once DIR_MODELS . "news.php";
	
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
		while($row = mysql_fetch_array($result))
		{
			$coment_author[$i] = $row['coment_author'];
			$coment_context[$i] = $row['coment_context'];
			$coment_date[$i] = $row['coment_date'];
			$i++;
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
	
	function edit_comment()
	{
		
	}
	
	if($action == "wszystkie" or $action == NULL)	
		show_all_news($query_show_all_news);
	
	if($action == "komentarze")
		show_comments($query_show_news_id.$news_id,$query_show_all_coments_news_id.$news_id,"");
	
	if($action == "new_coment")
		add_comment($query_add_news,$query_show_news_id,$query_show_all_coments_news_id);
	
	
