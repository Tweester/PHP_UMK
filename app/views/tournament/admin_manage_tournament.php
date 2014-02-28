<?php

	echo "<b>Edycja Kategorii</b></br></br>";
	echo "<form action=\"admin.php?session=".$session_id."&controler=".$controler."&action=db_tournament\" method=\"post\">	
		  Tytuł:<br />
		  <input size=\"50\" name=\"tournament_name\" value=\"".$tournament_name."\" /><br />
		  Treść:<br />
		  <textarea cols=\"50\" rows=\"10\" name=\"tournament_context\" value=\"\" />".$tournament_context."</textarea><br />
		  
		  <input type=\"hidden\" name=\"tournament_id\" value=\"".$tournament_id."\" />
 		  <input type=\"hidden\" name=\"tournament_action\" value=\"".$action."\" />
 		  
 		  <input type=\"submit\" value=\"Wyślij\" name=\"submit\" />
 		  </form>";