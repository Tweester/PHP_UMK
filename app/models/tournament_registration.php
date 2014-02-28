<?php

	//zapytania publiczne
	$query_list_tournament = "SELECT * FROM tournament_class";
	$query_add_player = "INSERT INTO tournament_registration (tr_name, tr_surname, tr_email, tr_robot_name, tr_tournament, tr_country, tr_city, tr_company) VALUES "; //dodanie komentarza
	
	
	//zapytania adminstratorskie
	$query_list_player = "SELECT * FROM tournament_registration";
	$query_tournament_name = "SELECT tc_name FROM tournament_class WHERE tc_id = ";
	$query_delete_player = "DELETE FROM tournament_registration WHERE tr_id = ";
	$query_actived_player = "UPDATE tournament_registration SET tr_active = 1 WHERE tr_id = ";
	
	