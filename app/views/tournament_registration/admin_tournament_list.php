<?php

	echo "<b>".$msg."</b></br>";
	echo "<TD>Lista kategorii zawodów</br>
		  <a href=admin.php?session=".$session_id."&controler=".$controler."&action=add_tournament>Dodaj Kategorie</a></br></br></TD></br>";
	for($i = 0; $i < count($tournament_id); $i++)
	{
		echo "<TD>".$tournament_name[$i]." <a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$tournament_id[$i]."&action=delete_tournament>Usuń</a>
									  <a href=admin.php?session=".$session_id."&controler=".$controler."&id=".$tournament_id[$i]."&action=edit_tournament>Edytuj</a></br></TD> ";	 
	}
