<?php

	//zapytania publiczne
	$query_show_all_news = "SELECT * FROM news ORDER BY news_date DESC"; //wszystkie newsy	
	$query_show_news_id = "SELECT * FROM news WHERE news_id = "; //news o id
	$query_show_all_coments_news_id = "SELECT * FROM news_coments WHERE coment_news_id = "; //wszystkie komentarze news'a id
	$query_add_news = "INSERT INTO news_coments (coment_news_id, coment_author, coment_date, coment_context) VALUES "; //dodanie komentarza
	
	
	//zapytania adminstratorskie
	$query_admin_news_list = "SELECT news_id, news_title FROM news";
	$query_admin_delete_news = "DELETE FROM news WHERE news_id = ";
	$query_admin_manage_news = "SELECT * FROM news WHERE news_id = ";
	$query_admin_add_news = "INSERT INTO news (news_title, news_context, news_date) VALUES ";
	$query_admin_update_news_p1 = "UPDATE news SET ";
	$query_admin_update_news_p2 = " WHERE news_id = ";
	
