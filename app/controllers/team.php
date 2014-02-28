<?php

	require_once DIR_MODELS . "team.php";

	@$action = $_GET["action"];

	function show_team($query)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$team_id[$i] = $row['team_id'];
			$team_name[$i] = $row['team_name'];
			$team_rank_name[$i] = $row['team_rank_name'];
			$team_info[$i] = $row['team_info'];
			$team_photo[$i] = $row['team_photo'];
			$i++;
		}
	
		require_once DIR_VIEWS . "team/team.php";	
	}
	
	if($action == NULL)
		show_team($query_show_all_team);
