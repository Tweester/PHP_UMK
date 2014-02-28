<?php
	echo "<TR>";
	echo "<TD> Organizatorzy CRT</TD></br></br>";
	
	for($i = 0; $i < count($team_id); $i++)
	{
		echo "<TR>";
		echo "<TD> <img src=\"". DIR_UPLOADS_DIR ."team/". $team_photo[$i]."150.jpg\"></br></TD>";
		echo "<TD><b>". $team_name[$i] . "</b> - ". $team_rank_name[$i] ."</TD></br>";
		echo "<TD>". $team_info[$i] ."</TD>";
		echo "<TR></br></br>";
	}


	