<?php
	require_once DIR_MODELS . "index.php";
	
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
	
	function show_footer()
	{
		//echo "stopka";
		$stopka = "stopka";
		
		return $stopka;
	}
	
	function controler_name($query, $controler)
	{
		$query = $query ."'". $controler ."'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);		
		
		return $controler_name = $row[0];;
	}
	
	function redner($query_all_models, $query_controler_name, $controler)
	{
		$controler_name = controler_name($query_controler_name, $controler);
		$modules = show_all_modules($query_all_models);
		$stopka = show_footer();
		require_once DIR_VIEWS . "index.php";	
	}
	
	redner($query_all_modules,$query_name, $controler);
			