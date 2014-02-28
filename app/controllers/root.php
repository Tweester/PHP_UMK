<?php
	require_once DIR_MODELS . "root.php";
	
	@$controler = $_GET["controler"];

	
	if ($controler == NULL)
		$controler = "news";
	
	function show_all_modules($query)
	{
		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$modules[$i] = $row['modules_path'];
			$modules[$i+1] = $row['modules_name'];
			$i+=2;
		}
		
		return $modules;
	}
	
	function redner($query_all_models, $query_controler_name, $controler, $session_id)
	{
		$modules = show_all_modules($query_all_models);
		require_once DIR_VIEWS . "root.php";	
	}
	
	redner($query_all_modules,$query_name, $controler, $session_id);
			