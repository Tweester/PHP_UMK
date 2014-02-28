<?php

	//zapytania publiczne
	$query_show_all_torunament = "SELECT * FROM tournament"; //wszystkie kategorie
	
	//zapytania adminstratorskie
	$query_admin_tournament_list = "SELECT tournament_id, tournament_name FROM tournament";
	$query_admin_delete_tournament = "DELETE FROM tournament WHERE tournament_id = ";
	$query_admin_manage_tournament = "SELECT * FROM tournament WHERE tournament_id = ";
	$query_admin_add_tournament = "INSERT INTO tournament (tournament_name, tournament_context) VALUES ";
	$query_admin_update_tournament_p1 = "UPDATE tournament SET ";
	$query_admin_update_tournament_p2 = " WHERE tournament_id = ";
	
	
