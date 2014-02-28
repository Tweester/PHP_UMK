<?php

	require_once DIR_MODELS . "tournament_registration.php";
	
	@$action = $_GET["action"];
	@$category_id = $_GET["id"];
	$msg = "";
	
	//tworzenie listy pustej formularza
	for($i = 0; $i < 9; $i++)
		$form_list[$i] = "";


	function check_data($query_list_tournament,$query_add_player, $post_array)
	{
		$i = 0;
		$ec = 0;
		
		extract($post_array);
		$form_list[0] = $reg_name;
		$form_list[1] = $reg_surname;
		$form_list[2] = $reg_email;
		$form_list[3] = $reg_email2;
		$form_list[4] = $reg_country;
		$form_list[5] = $reg_city;
		$form_list[6] = $reg_company;
		$form_list[7] = $reg_robo_name;
		$form_list[8] = $reg_tournament_class;
		
		if($form_list[0] == '')
		{
			$error_msg[$ec] = "Nie podaleś imienia!";
			$ec++;
		}

		if($form_list[1] == "")
		{
			$error_msg[$ec] = "Nie podaleś nazwiska!";
			$ec++;
		}
		
		if($form_list[2] == "" || $form_list[3] == "")
		{
			$error_msg[$ec] = "Nie podaleś E-Maila!";
			$ec++;
		}
		
		if($form_list[2] != $form_list[3])
		{
			$error_msg[$ec] = "Podane E-Mail różnią się";
			$ec++;
		}
				
		if($form_list[4] == "")
		{
			$error_msg[$ec] = "Nie podaleś kraju!";
			$ec++;
		}
		
		
		if($form_list[5] == "")
		{
			$error_msg[$ec] = "Nie podaleś miasta!";
			$ec++;
		}
		
		if($form_list[7] == "")
		{
			$error_msg[$ec] = "Nie podaleś nazwy robota!";
			$ec++;
		}
		
		if($ec > 0)
			render($query_list_tournament,$form_list,$error_msg);
		else
			create_player($query_add_player,$form_list);	
		
	}


	function create_player($query, $form_list)
	{
		$query_add_player = "INSERT INTO news_coments (tr_name, tr_surname, tr_email, tr_robot_name, tr_tournament, tr_country, tr_city, tr_company) VALUES "; //dodanie komentarza
		$query = $query."('".$form_list[0]."','".$form_list[1]."','".$form_list[2]."','".$form_list[7]."',".$form_list[8].",'".$form_list[4]."','".$form_list[5]."','".$form_list[6]."')";
		
		echo $query;
		
		$result = mysql_query($query);
		
		if($result == 1)
			$msg = "Poprawnie zakończono rejestracje!";
		else 
			$msg = "Błąd przy rejestracji!";
		
		require_once DIR_VIEWS . "tournament_registration/end_registration.php";
		
	}
	
	function render($query, $form_list, $error)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$tc_id[$i] = $row['tc_idname'];
			$tc_name[$i] = $row['tc_name'];
			$i++;
		}
	
		require_once DIR_VIEWS . "tournament_registration/tournament_registration.php";	
	}
	
	//funkcje administratorskie
	
	function show_all_players($query, $query_name, $session_id, $controler, $msg)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$tr_id[$i] = $row['tr_id'];
			$tr_name[$i] = $row['tr_name'];
			$tr_surname[$i] = $row['tr_surname'];
			$tr_email[$i] = $row['tr_email'];
			$tr_active[$i] = $row['tr_active'];
			$tr_robot_name[$i] = $row['tr_robot_name'];
			$tr_tournament[$i] = $row['tr_tournament'];
			$tr_country[$i] = $row['tr_country'];
			$tr_city[$i] = $row['tr_city'];
			$tr_company[$i] = $row['tr_company'];
			
			$result_name = mysql_query($query_name.$tr_tournament[$i]);
			$row_name = mysql_fetch_array($result_name);			
			$tr_tournament[$i] = $row_name[0];
			
			if($tr_active[$i] == "1")
				$tr_active[$i] = "TAK";
			else
				$tr_active[$i] = "NIE";

			$i++;
		}
		
		require_once DIR_VIEWS . "tournament_registration/admin_tournament_reg.php";
	
	}

	function manage_player($action, $query_active, $query_delete, $session_id, $controler, $query_list, $query_name)
	{
			$player_id = $_GET['id'];

			if($action == "delete_player")
			{
				$query = $query_delete.$player_id;
			}
			
			if($action == "active_player")
			{
				$query = $query_active.$player_id;	
			}
				
			$result = mysql_query($query);
			
			if($result != NULL)
			{
				if($action == "active_player")
					$msg = "Aktywowano gracza!";
				else
					$msg = "Usunięto gracza";
			}
			else
			{
				if($action == "active_player")
					$msg = "Aktywacja gracza zakończona niepowodzeniem!";
				else
					$msg = "Błąd usuniecia gracza!";
			}
			
			show_all_players($query_list, $query_name, $session_id, $controler, $msg);
			
	}
	
	
	if($action == NULL)
		render($query_list_tournament,$form_list, 0);
	if($action == "new_player")
		check_data($query_list_tournament,$query_add_player,$_POST);
	if($action == "admin")
		show_all_players($query_list_player, $query_tournament_name, $session_id, $controler, $msg);
	if($action == "active_player" || $action == "delete_player")
		manage_player($action, $query_actived_player,$query_delete_player, $session_id, $controler, $query_list_player, $query_tournament_name);

