<?php
	echo "Kontroler: ". $controler;
	echo "</br>Kontroler name:". $controler_name;
	echo "</br></br><HTML>
		<HEAD>
			<title>". $controler_name ."</title>
			<meta charset=\"utf-8\" />
	</HEAD>";

	echo "<TD>MENU</TD></br>";

	
	for($i = 0; $i < count($modules); $i=$i+2)
	{
		echo "<TD><a href=index.php?controler=".$modules[$i].">".$modules[$i+1]."</a></TD> ";	
	}
	echo "</br></br>";
	
	//zamiana na funkcje ze sprawdzeniem istnienia kotnrolera
	require_once DIR_CONTROLLERS . $controler.".php";
	
	echo $stopka;

	