<?php
	echo "<TR>";
	echo "<TD> Opis konkurencji CRT</TD></br></br>";
	
	for($i = 0; $i < count($tournament_id); $i++)
	{
		echo "<TR>";
		echo "<TD><b>". $tournament_title[$i] . "</b></TD></br>";
		echo "<TD>". $tournament_context[$i] ."</TD>";
		echo "<TR></br></br>";
	}


	