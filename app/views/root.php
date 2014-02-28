<?php
	echo "Kontroler: ". $controler;
	echo "</br></br><HTML>
		<HEAD>
			<meta charset=\"utf-8\" />
	</HEAD>";

	echo "<TD>MENU</TD></br>";

	
	for($i = 0; $i < count($modules); $i=$i+2)
	{
		echo "<TD><a href=admin.php?session=".$session_id."&controler=".$modules[$i]."&action=admin>".$modules[$i+1]."</a></TD> ";	
	}
	echo "</br></br>";
	
	//zamiana na funkcje ze sprawdzeniem istnienia kotnrolera
	require_once DIR_CONTROLLERS . $controler.".php";
	

	